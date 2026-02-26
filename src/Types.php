<?php

declare(strict_types=1);

namespace NimbusSdk\DamManagement;

final class AssetDetailResponse implements \JsonSerializable
{
    public function __construct(
        public AssetRecord $asset,
        public ?UploadedAssetVersion $latestVersion = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetDetailResponse
    {
        if (!array_key_exists('asset', $data)) {
            throw new \InvalidArgumentException('Missing required field asset');
        }
        $asset = AssetRecord::fromArray(is_array($data['asset']) ? $data['asset'] : []);
        $latestVersion = array_key_exists('latestVersion', $data)
            ? UploadedAssetVersion::fromArray(is_array($data['latestVersion']) ? $data['latestVersion'] : [])
            : null;
        return new AssetDetailResponse(
            $asset,
            $latestVersion
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['asset'] = $this->asset->toArray();
        if ($this->latestVersion !== null) {
            $data['latestVersion'] = $this->latestVersion->toArray();
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetDownloadResponse implements \JsonSerializable
{
    public function __construct(
        public string $downloadUrl,
        public string $expiresAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetDownloadResponse
    {
        if (!array_key_exists('downloadUrl', $data)) {
            throw new \InvalidArgumentException('Missing required field downloadUrl');
        }
        $downloadUrl = (string) $data['downloadUrl'];
        if (!array_key_exists('expiresAt', $data)) {
            throw new \InvalidArgumentException('Missing required field expiresAt');
        }
        $expiresAt = (string) $data['expiresAt'];
        return new AssetDownloadResponse(
            $downloadUrl,
            $expiresAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['downloadUrl'] = $this->downloadUrl;
        $data['expiresAt'] = $this->expiresAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetFilterPayload implements \JsonSerializable
{
    public function __construct(
        public string $kind,
        public AssetFilterPayloadPathList $path,
        public ?string $value = null,
        public ?string $collectionId = null,
        public ?string $albumId = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetFilterPayload
    {
        if (!array_key_exists('kind', $data)) {
            throw new \InvalidArgumentException('Missing required field kind');
        }
        $kind = (string) $data['kind'];
        $value = array_key_exists('value', $data)
            ? (string) $data['value']
            : null;
        $collectionId = array_key_exists('collectionId', $data)
            ? (string) $data['collectionId']
            : null;
        $albumId = array_key_exists('albumId', $data)
            ? (string) $data['albumId']
            : null;
        if (!array_key_exists('path', $data)) {
            throw new \InvalidArgumentException('Missing required field path');
        }
        $path = AssetFilterPayloadPathList::fromArray(is_array($data['path']) ? $data['path'] : []);
        return new AssetFilterPayload(
            $kind,
            $path,
            $value,
            $collectionId,
            $albumId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['kind'] = $this->kind;
        if ($this->value !== null) {
            $data['value'] = $this->value;
        }
        if ($this->collectionId !== null) {
            $data['collectionId'] = $this->collectionId;
        }
        if ($this->albumId !== null) {
            $data['albumId'] = $this->albumId;
        }
        $data['path'] = $this->path->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetFilterPayloadPathList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetFilterPayloadPathList
    {
        return new AssetFilterPayloadPathList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetPrefixListResponse implements \JsonSerializable
{
    public function __construct(
        public AssetPrefixListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetPrefixListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = AssetPrefixListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new AssetPrefixListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetPrefixListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetPrefixListResponseItemsList
    {
        return new AssetPrefixListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetPrefixRecord implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $prefixId,
        public string $prefix,
        public string $createdAt,
        public string $updatedAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetPrefixRecord
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('prefixId', $data)) {
            throw new \InvalidArgumentException('Missing required field prefixId');
        }
        $prefixId = (string) $data['prefixId'];
        if (!array_key_exists('prefix', $data)) {
            throw new \InvalidArgumentException('Missing required field prefix');
        }
        $prefix = (string) $data['prefix'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        return new AssetPrefixRecord(
            $tenantId,
            $prefixId,
            $prefix,
            $createdAt,
            $updatedAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['prefixId'] = $this->prefixId;
        $data['prefix'] = $this->prefix;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetPrefixResponse implements \JsonSerializable
{
    public function __construct(
        public AssetPrefixRecord $prefix
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetPrefixResponse
    {
        if (!array_key_exists('prefix', $data)) {
            throw new \InvalidArgumentException('Missing required field prefix');
        }
        $prefix = AssetPrefixRecord::fromArray(is_array($data['prefix']) ? $data['prefix'] : []);
        return new AssetPrefixResponse(
            $prefix
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['prefix'] = $this->prefix->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetRecord implements \JsonSerializable
{
    public function __construct(
        public string $assetId,
        public string $displayName,
        public string $mediaType,
        public string $lifecycleState,
        public AssetRecordMetadataList $metadata,
        public string $createdAt,
        public string $updatedAt,
        public ?string $description = null,
        public ?string $path = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetRecord
    {
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        if (!array_key_exists('mediaType', $data)) {
            throw new \InvalidArgumentException('Missing required field mediaType');
        }
        $mediaType = (string) $data['mediaType'];
        if (!array_key_exists('lifecycleState', $data)) {
            throw new \InvalidArgumentException('Missing required field lifecycleState');
        }
        $lifecycleState = (string) $data['lifecycleState'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = AssetRecordMetadataList::fromArray(is_array($data['metadata']) ? $data['metadata'] : []);
        $path = array_key_exists('path', $data)
            ? (string) $data['path']
            : null;
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        return new AssetRecord(
            $assetId,
            $displayName,
            $mediaType,
            $lifecycleState,
            $metadata,
            $createdAt,
            $updatedAt,
            $description,
            $path
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['assetId'] = $this->assetId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        $data['mediaType'] = $this->mediaType;
        $data['lifecycleState'] = $this->lifecycleState;
        $data['metadata'] = $this->metadata->toArray();
        if ($this->path !== null) {
            $data['path'] = $this->path;
        }
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetRecordMetadataList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetRecordMetadataList
    {
        return new AssetRecordMetadataList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetRenditionListResponse implements \JsonSerializable
{
    public function __construct(
        public AssetRenditionListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetRenditionListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = AssetRenditionListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new AssetRenditionListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetRenditionListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetRenditionListResponseItemsList
    {
        return new AssetRenditionListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetRenditionRecord implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $assetId,
        public string $renditionId,
        public string $versionId,
        public string $profile,
        public string $pipelineRef,
        public string $storageKey,
        public string $status,
        public array $metadata,
        public string $createdAt,
        public ?string $pipelineRevision = null,
        public ?string $contentType = null,
        public ?string $completedAt = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetRenditionRecord
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('renditionId', $data)) {
            throw new \InvalidArgumentException('Missing required field renditionId');
        }
        $renditionId = (string) $data['renditionId'];
        if (!array_key_exists('versionId', $data)) {
            throw new \InvalidArgumentException('Missing required field versionId');
        }
        $versionId = (string) $data['versionId'];
        if (!array_key_exists('profile', $data)) {
            throw new \InvalidArgumentException('Missing required field profile');
        }
        $profile = (string) $data['profile'];
        if (!array_key_exists('pipelineRef', $data)) {
            throw new \InvalidArgumentException('Missing required field pipelineRef');
        }
        $pipelineRef = (string) $data['pipelineRef'];
        $pipelineRevision = array_key_exists('pipelineRevision', $data)
            ? (string) $data['pipelineRevision']
            : null;
        if (!array_key_exists('storageKey', $data)) {
            throw new \InvalidArgumentException('Missing required field storageKey');
        }
        $storageKey = (string) $data['storageKey'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = is_array($data['metadata']) ? $data['metadata'] : [];
        $contentType = array_key_exists('contentType', $data)
            ? (string) $data['contentType']
            : null;
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        $completedAt = array_key_exists('completedAt', $data)
            ? (string) $data['completedAt']
            : null;
        return new AssetRenditionRecord(
            $tenantId,
            $assetId,
            $renditionId,
            $versionId,
            $profile,
            $pipelineRef,
            $storageKey,
            $status,
            $metadata,
            $createdAt,
            $pipelineRevision,
            $contentType,
            $completedAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['assetId'] = $this->assetId;
        $data['renditionId'] = $this->renditionId;
        $data['versionId'] = $this->versionId;
        $data['profile'] = $this->profile;
        $data['pipelineRef'] = $this->pipelineRef;
        if ($this->pipelineRevision !== null) {
            $data['pipelineRevision'] = $this->pipelineRevision;
        }
        $data['storageKey'] = $this->storageKey;
        $data['status'] = $this->status;
        $data['metadata'] = $this->metadata;
        if ($this->contentType !== null) {
            $data['contentType'] = $this->contentType;
        }
        $data['createdAt'] = $this->createdAt;
        if ($this->completedAt !== null) {
            $data['completedAt'] = $this->completedAt;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchItem implements \JsonSerializable
{
    public function __construct(
        public string $assetId,
        public string $displayName,
        public string $mediaType,
        public string $lifecycleState,
        public string $bucketName,
        public string $createdAt,
        public string $updatedAt,
        public float $score,
        public ?string $description = null,
        public ?string $path = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetSearchItem
    {
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        if (!array_key_exists('mediaType', $data)) {
            throw new \InvalidArgumentException('Missing required field mediaType');
        }
        $mediaType = (string) $data['mediaType'];
        if (!array_key_exists('lifecycleState', $data)) {
            throw new \InvalidArgumentException('Missing required field lifecycleState');
        }
        $lifecycleState = (string) $data['lifecycleState'];
        if (!array_key_exists('bucketName', $data)) {
            throw new \InvalidArgumentException('Missing required field bucketName');
        }
        $bucketName = (string) $data['bucketName'];
        $path = array_key_exists('path', $data)
            ? (string) $data['path']
            : null;
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('score', $data)) {
            throw new \InvalidArgumentException('Missing required field score');
        }
        $score = (float) $data['score'];
        return new AssetSearchItem(
            $assetId,
            $displayName,
            $mediaType,
            $lifecycleState,
            $bucketName,
            $createdAt,
            $updatedAt,
            $score,
            $description,
            $path
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['assetId'] = $this->assetId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        $data['mediaType'] = $this->mediaType;
        $data['lifecycleState'] = $this->lifecycleState;
        $data['bucketName'] = $this->bucketName;
        if ($this->path !== null) {
            $data['path'] = $this->path;
        }
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['score'] = $this->score;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchRequest implements \JsonSerializable
{
    public function __construct(
        public AssetSearchRequestFiltersList $filters,
        public AssetSearchRequestSortsList $sorts,
        public ?string $term = null,
        public ?int $limit = null,
        public ?int $offset = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetSearchRequest
    {
        $term = array_key_exists('term', $data)
            ? (string) $data['term']
            : null;
        if (!array_key_exists('filters', $data)) {
            throw new \InvalidArgumentException('Missing required field filters');
        }
        $filters = AssetSearchRequestFiltersList::fromArray(is_array($data['filters']) ? $data['filters'] : []);
        if (!array_key_exists('sorts', $data)) {
            throw new \InvalidArgumentException('Missing required field sorts');
        }
        $sorts = AssetSearchRequestSortsList::fromArray(is_array($data['sorts']) ? $data['sorts'] : []);
        $limit = array_key_exists('limit', $data)
            ? (int) $data['limit']
            : null;
        $offset = array_key_exists('offset', $data)
            ? (int) $data['offset']
            : null;
        return new AssetSearchRequest(
            $filters,
            $sorts,
            $term,
            $limit,
            $offset
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->term !== null) {
            $data['term'] = $this->term;
        }
        $data['filters'] = $this->filters->toArray();
        $data['sorts'] = $this->sorts->toArray();
        if ($this->limit !== null) {
            $data['limit'] = $this->limit;
        }
        if ($this->offset !== null) {
            $data['offset'] = $this->offset;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchRequestFiltersList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetSearchRequestFiltersList
    {
        return new AssetSearchRequestFiltersList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchRequestSortsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetSearchRequestSortsList
    {
        return new AssetSearchRequestSortsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchResponse implements \JsonSerializable
{
    public function __construct(
        public int $total,
        public AssetSearchResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetSearchResponse
    {
        if (!array_key_exists('total', $data)) {
            throw new \InvalidArgumentException('Missing required field total');
        }
        $total = (int) $data['total'];
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = AssetSearchResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new AssetSearchResponse(
            $total,
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['total'] = $this->total;
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSearchResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetSearchResponseItemsList
    {
        return new AssetSearchResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetSortPayload implements \JsonSerializable
{
    public function __construct(
        public string $field,
        public ?string $direction = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetSortPayload
    {
        if (!array_key_exists('field', $data)) {
            throw new \InvalidArgumentException('Missing required field field');
        }
        $field = (string) $data['field'];
        $direction = array_key_exists('direction', $data)
            ? (string) $data['direction']
            : null;
        return new AssetSortPayload(
            $field,
            $direction
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['field'] = $this->field;
        if ($this->direction !== null) {
            $data['direction'] = $this->direction;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetVersionMetadataResponse implements \JsonSerializable
{
    public function __construct(
        public AssetVersionMetadataResponseMetadataList $metadata
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): AssetVersionMetadataResponse
    {
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = AssetVersionMetadataResponseMetadataList::fromArray(is_array($data['metadata']) ? $data['metadata'] : []);
        return new AssetVersionMetadataResponse(
            $metadata
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['metadata'] = $this->metadata->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class AssetVersionMetadataResponseMetadataList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): AssetVersionMetadataResponseMetadataList
    {
        return new AssetVersionMetadataResponseMetadataList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class BucketListResponse implements \JsonSerializable
{
    public function __construct(
        public BucketListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): BucketListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = BucketListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new BucketListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class BucketListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): BucketListResponseItemsList
    {
        return new BucketListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class BucketRecord implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $bucketName,
        public string $createdAt,
        public string $updatedAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): BucketRecord
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('bucketName', $data)) {
            throw new \InvalidArgumentException('Missing required field bucketName');
        }
        $bucketName = (string) $data['bucketName'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        return new BucketRecord(
            $tenantId,
            $bucketName,
            $createdAt,
            $updatedAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['bucketName'] = $this->bucketName;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionListResponse implements \JsonSerializable
{
    public function __construct(
        public CollectionListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = CollectionListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new CollectionListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CollectionListResponseItemsList
    {
        return new CollectionListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipChangeRequest implements \JsonSerializable
{
    public function __construct(
        public CollectionMembershipChangeRequestMembersList $members
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipChangeRequest
    {
        if (!array_key_exists('members', $data)) {
            throw new \InvalidArgumentException('Missing required field members');
        }
        $members = CollectionMembershipChangeRequestMembersList::fromArray(is_array($data['members']) ? $data['members'] : []);
        return new CollectionMembershipChangeRequest(
            $members
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['members'] = $this->members->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipChangeRequestMembersList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipChangeRequestMembersList
    {
        return new CollectionMembershipChangeRequestMembersList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipListResponse implements \JsonSerializable
{
    public function __construct(
        public CollectionMembershipListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = CollectionMembershipListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new CollectionMembershipListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipListResponseItemsList
    {
        return new CollectionMembershipListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipRequest implements \JsonSerializable
{
    public function __construct(
        public string $assetId,
        public ?string $membershipId = null,
        public ?string $renditionId = null,
        public ?string $addedBy = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipRequest
    {
        $membershipId = array_key_exists('membershipId', $data)
            ? (string) $data['membershipId']
            : null;
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        $renditionId = array_key_exists('renditionId', $data)
            ? (string) $data['renditionId']
            : null;
        $addedBy = array_key_exists('addedBy', $data)
            ? (string) $data['addedBy']
            : null;
        return new CollectionMembershipRequest(
            $assetId,
            $membershipId,
            $renditionId,
            $addedBy
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->membershipId !== null) {
            $data['membershipId'] = $this->membershipId;
        }
        $data['assetId'] = $this->assetId;
        if ($this->renditionId !== null) {
            $data['renditionId'] = $this->renditionId;
        }
        if ($this->addedBy !== null) {
            $data['addedBy'] = $this->addedBy;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionMembershipResponse implements \JsonSerializable
{
    public function __construct(
        public string $membershipId,
        public string $tenantId,
        public string $collectionId,
        public string $assetId,
        public string $addedAt,
        public ?string $renditionId = null,
        public ?string $addedBy = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionMembershipResponse
    {
        if (!array_key_exists('membershipId', $data)) {
            throw new \InvalidArgumentException('Missing required field membershipId');
        }
        $membershipId = (string) $data['membershipId'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('collectionId', $data)) {
            throw new \InvalidArgumentException('Missing required field collectionId');
        }
        $collectionId = (string) $data['collectionId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        $renditionId = array_key_exists('renditionId', $data)
            ? (string) $data['renditionId']
            : null;
        if (!array_key_exists('addedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field addedAt');
        }
        $addedAt = (string) $data['addedAt'];
        $addedBy = array_key_exists('addedBy', $data)
            ? (string) $data['addedBy']
            : null;
        return new CollectionMembershipResponse(
            $membershipId,
            $tenantId,
            $collectionId,
            $assetId,
            $addedAt,
            $renditionId,
            $addedBy
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['membershipId'] = $this->membershipId;
        $data['tenantId'] = $this->tenantId;
        $data['collectionId'] = $this->collectionId;
        $data['assetId'] = $this->assetId;
        if ($this->renditionId !== null) {
            $data['renditionId'] = $this->renditionId;
        }
        $data['addedAt'] = $this->addedAt;
        if ($this->addedBy !== null) {
            $data['addedBy'] = $this->addedBy;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CollectionResponse implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $collectionId,
        public string $displayName,
        public string $createdAt,
        public string $updatedAt,
        public int $lockVersion,
        public ?string $description = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CollectionResponse
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('collectionId', $data)) {
            throw new \InvalidArgumentException('Missing required field collectionId');
        }
        $collectionId = (string) $data['collectionId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('lockVersion', $data)) {
            throw new \InvalidArgumentException('Missing required field lockVersion');
        }
        $lockVersion = (int) $data['lockVersion'];
        return new CollectionResponse(
            $tenantId,
            $collectionId,
            $displayName,
            $createdAt,
            $updatedAt,
            $lockVersion,
            $description
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['collectionId'] = $this->collectionId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['lockVersion'] = $this->lockVersion;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CompleteIngestionRequest implements \JsonSerializable
{
    public function __construct(
        public string $uploadToken,
        public string $checksumAlgorithm,
        public string $checksum,
        public int $sizeBytes
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CompleteIngestionRequest
    {
        if (!array_key_exists('uploadToken', $data)) {
            throw new \InvalidArgumentException('Missing required field uploadToken');
        }
        $uploadToken = (string) $data['uploadToken'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('checksum', $data)) {
            throw new \InvalidArgumentException('Missing required field checksum');
        }
        $checksum = (string) $data['checksum'];
        if (!array_key_exists('sizeBytes', $data)) {
            throw new \InvalidArgumentException('Missing required field sizeBytes');
        }
        $sizeBytes = (int) $data['sizeBytes'];
        return new CompleteIngestionRequest(
            $uploadToken,
            $checksumAlgorithm,
            $checksum,
            $sizeBytes
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['uploadToken'] = $this->uploadToken;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['checksum'] = $this->checksum;
        $data['sizeBytes'] = $this->sizeBytes;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateAssetPrefixRequest implements \JsonSerializable
{
    public function __construct(
        public string $prefix
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateAssetPrefixRequest
    {
        if (!array_key_exists('prefix', $data)) {
            throw new \InvalidArgumentException('Missing required field prefix');
        }
        $prefix = (string) $data['prefix'];
        return new CreateAssetPrefixRequest(
            $prefix
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['prefix'] = $this->prefix;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateBucketRequest implements \JsonSerializable
{
    public function __construct(
        public string $bucketName
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateBucketRequest
    {
        if (!array_key_exists('bucketName', $data)) {
            throw new \InvalidArgumentException('Missing required field bucketName');
        }
        $bucketName = (string) $data['bucketName'];
        return new CreateBucketRequest(
            $bucketName
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['bucketName'] = $this->bucketName;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateCollectionRequest implements \JsonSerializable
{
    public function __construct(
        public string $collectionId,
        public string $displayName,
        public ?string $description = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateCollectionRequest
    {
        if (!array_key_exists('collectionId', $data)) {
            throw new \InvalidArgumentException('Missing required field collectionId');
        }
        $collectionId = (string) $data['collectionId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        return new CreateCollectionRequest(
            $collectionId,
            $displayName,
            $description
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['collectionId'] = $this->collectionId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreatePipelineRequest implements \JsonSerializable
{
    public function __construct(
        public string $displayName,
        public CreatePipelineRequestRenditionsList $renditions,
        public CreatePipelineRequestRulesList $rules,
        public ?string $notes = null,
        public ?string $pipelinePrefix = null,
        public ?string $cdnHost = null,
        public ?bool $enabled = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreatePipelineRequest
    {
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $notes = array_key_exists('notes', $data)
            ? (string) $data['notes']
            : null;
        $pipelinePrefix = array_key_exists('pipelinePrefix', $data)
            ? (string) $data['pipelinePrefix']
            : null;
        $cdnHost = array_key_exists('cdnHost', $data)
            ? (string) $data['cdnHost']
            : null;
        $enabled = array_key_exists('enabled', $data)
            ? (bool) $data['enabled']
            : null;
        if (!array_key_exists('renditions', $data)) {
            throw new \InvalidArgumentException('Missing required field renditions');
        }
        $renditions = CreatePipelineRequestRenditionsList::fromArray(is_array($data['renditions']) ? $data['renditions'] : []);
        if (!array_key_exists('rules', $data)) {
            throw new \InvalidArgumentException('Missing required field rules');
        }
        $rules = CreatePipelineRequestRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : []);
        return new CreatePipelineRequest(
            $displayName,
            $renditions,
            $rules,
            $notes,
            $pipelinePrefix,
            $cdnHost,
            $enabled
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['displayName'] = $this->displayName;
        if ($this->notes !== null) {
            $data['notes'] = $this->notes;
        }
        if ($this->pipelinePrefix !== null) {
            $data['pipelinePrefix'] = $this->pipelinePrefix;
        }
        if ($this->cdnHost !== null) {
            $data['cdnHost'] = $this->cdnHost;
        }
        if ($this->enabled !== null) {
            $data['enabled'] = $this->enabled;
        }
        $data['renditions'] = $this->renditions->toArray();
        $data['rules'] = $this->rules->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreatePipelineRequestRenditionsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CreatePipelineRequestRenditionsList
    {
        return new CreatePipelineRequestRenditionsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreatePipelineRequestRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CreatePipelineRequestRulesList
    {
        return new CreatePipelineRequestRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateSmartAlbumRequest implements \JsonSerializable
{
    public function __construct(
        public string $albumId,
        public string $displayName,
        public array $definition,
        public CreateSmartAlbumRequestRulesList $rules,
        public ?string $description = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateSmartAlbumRequest
    {
        if (!array_key_exists('albumId', $data)) {
            throw new \InvalidArgumentException('Missing required field albumId');
        }
        $albumId = (string) $data['albumId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        if (!array_key_exists('definition', $data)) {
            throw new \InvalidArgumentException('Missing required field definition');
        }
        $definition = is_array($data['definition']) ? $data['definition'] : [];
        if (!array_key_exists('rules', $data)) {
            throw new \InvalidArgumentException('Missing required field rules');
        }
        $rules = CreateSmartAlbumRequestRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : []);
        return new CreateSmartAlbumRequest(
            $albumId,
            $displayName,
            $definition,
            $rules,
            $description
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['albumId'] = $this->albumId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        $data['definition'] = $this->definition;
        $data['rules'] = $this->rules->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateSmartAlbumRequestRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): CreateSmartAlbumRequestRulesList
    {
        return new CreateSmartAlbumRequestRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CustomMetadataRequest implements \JsonSerializable
{
    public function __construct(
        public array $customMetadata
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CustomMetadataRequest
    {
        if (!array_key_exists('customMetadata', $data)) {
            throw new \InvalidArgumentException('Missing required field customMetadata');
        }
        $customMetadata = is_array($data['customMetadata']) ? $data['customMetadata'] : [];
        return new CustomMetadataRequest(
            $customMetadata
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['customMetadata'] = $this->customMetadata;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class IndexSnapshotRequest implements \JsonSerializable
{
    public function __construct(
        public string $snapshotId,
        public string $assetId,
        public string $indexScope,
        public string $document,
        public array $metadata,
        public string $materializedAt,
        public ?string $renditionId = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): IndexSnapshotRequest
    {
        if (!array_key_exists('snapshotId', $data)) {
            throw new \InvalidArgumentException('Missing required field snapshotId');
        }
        $snapshotId = (string) $data['snapshotId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        $renditionId = array_key_exists('renditionId', $data)
            ? (string) $data['renditionId']
            : null;
        if (!array_key_exists('indexScope', $data)) {
            throw new \InvalidArgumentException('Missing required field indexScope');
        }
        $indexScope = (string) $data['indexScope'];
        if (!array_key_exists('document', $data)) {
            throw new \InvalidArgumentException('Missing required field document');
        }
        $document = (string) $data['document'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = is_array($data['metadata']) ? $data['metadata'] : [];
        if (!array_key_exists('materializedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field materializedAt');
        }
        $materializedAt = (string) $data['materializedAt'];
        return new IndexSnapshotRequest(
            $snapshotId,
            $assetId,
            $indexScope,
            $document,
            $metadata,
            $materializedAt,
            $renditionId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['snapshotId'] = $this->snapshotId;
        $data['assetId'] = $this->assetId;
        if ($this->renditionId !== null) {
            $data['renditionId'] = $this->renditionId;
        }
        $data['indexScope'] = $this->indexScope;
        $data['document'] = $this->document;
        $data['metadata'] = $this->metadata;
        $data['materializedAt'] = $this->materializedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class IndexSnapshotResponse implements \JsonSerializable
{
    public function __construct(
        public string $snapshotId,
        public string $tenantId,
        public string $assetId,
        public string $indexScope,
        public string $document,
        public array $metadata,
        public string $materializedAt,
        public ?string $renditionId = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): IndexSnapshotResponse
    {
        if (!array_key_exists('snapshotId', $data)) {
            throw new \InvalidArgumentException('Missing required field snapshotId');
        }
        $snapshotId = (string) $data['snapshotId'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        $renditionId = array_key_exists('renditionId', $data)
            ? (string) $data['renditionId']
            : null;
        if (!array_key_exists('indexScope', $data)) {
            throw new \InvalidArgumentException('Missing required field indexScope');
        }
        $indexScope = (string) $data['indexScope'];
        if (!array_key_exists('document', $data)) {
            throw new \InvalidArgumentException('Missing required field document');
        }
        $document = (string) $data['document'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = is_array($data['metadata']) ? $data['metadata'] : [];
        if (!array_key_exists('materializedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field materializedAt');
        }
        $materializedAt = (string) $data['materializedAt'];
        return new IndexSnapshotResponse(
            $snapshotId,
            $tenantId,
            $assetId,
            $indexScope,
            $document,
            $metadata,
            $materializedAt,
            $renditionId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['snapshotId'] = $this->snapshotId;
        $data['tenantId'] = $this->tenantId;
        $data['assetId'] = $this->assetId;
        if ($this->renditionId !== null) {
            $data['renditionId'] = $this->renditionId;
        }
        $data['indexScope'] = $this->indexScope;
        $data['document'] = $this->document;
        $data['metadata'] = $this->metadata;
        $data['materializedAt'] = $this->materializedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class IngestionRequest implements \JsonSerializable
{
    public function __construct(
        public string $displayName,
        public string $mediaType,
        public int $contentLength,
        public string $checksumAlgorithm,
        public string $checksum,
        public array $metadata,
        public ?string $pathPrefix = null,
        public ?string $bucketName = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): IngestionRequest
    {
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        if (!array_key_exists('mediaType', $data)) {
            throw new \InvalidArgumentException('Missing required field mediaType');
        }
        $mediaType = (string) $data['mediaType'];
        if (!array_key_exists('contentLength', $data)) {
            throw new \InvalidArgumentException('Missing required field contentLength');
        }
        $contentLength = (int) $data['contentLength'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('checksum', $data)) {
            throw new \InvalidArgumentException('Missing required field checksum');
        }
        $checksum = (string) $data['checksum'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = is_array($data['metadata']) ? $data['metadata'] : [];
        $pathPrefix = array_key_exists('pathPrefix', $data)
            ? (string) $data['pathPrefix']
            : null;
        $bucketName = array_key_exists('bucketName', $data)
            ? (string) $data['bucketName']
            : null;
        return new IngestionRequest(
            $displayName,
            $mediaType,
            $contentLength,
            $checksumAlgorithm,
            $checksum,
            $metadata,
            $pathPrefix,
            $bucketName
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['displayName'] = $this->displayName;
        $data['mediaType'] = $this->mediaType;
        $data['contentLength'] = $this->contentLength;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['checksum'] = $this->checksum;
        $data['metadata'] = $this->metadata;
        if ($this->pathPrefix !== null) {
            $data['pathPrefix'] = $this->pathPrefix;
        }
        if ($this->bucketName !== null) {
            $data['bucketName'] = $this->bucketName;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class IngestionResponse implements \JsonSerializable
{
    public function __construct(
        public RegisteredAsset $asset,
        public PendingUploadVersion $version,
        public UploadTicket $upload
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): IngestionResponse
    {
        if (!array_key_exists('asset', $data)) {
            throw new \InvalidArgumentException('Missing required field asset');
        }
        $asset = RegisteredAsset::fromArray(is_array($data['asset']) ? $data['asset'] : []);
        if (!array_key_exists('version', $data)) {
            throw new \InvalidArgumentException('Missing required field version');
        }
        $version = PendingUploadVersion::fromArray(is_array($data['version']) ? $data['version'] : []);
        if (!array_key_exists('upload', $data)) {
            throw new \InvalidArgumentException('Missing required field upload');
        }
        $upload = UploadTicket::fromArray(is_array($data['upload']) ? $data['upload'] : []);
        return new IngestionResponse(
            $asset,
            $version,
            $upload
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['asset'] = $this->asset->toArray();
        $data['version'] = $this->version->toArray();
        $data['upload'] = $this->upload->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class LifecycleExposureRequest implements \JsonSerializable
{
    public function __construct(
        public string $pipelineRef,
        public string $ruleSlug,
        public string $path,
        public string $contentType,
        public ?string $storageKey = null,
        public ?string $cachePolicy = null,
        public ?LifecycleExposureSchedule $schedule = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): LifecycleExposureRequest
    {
        if (!array_key_exists('pipelineRef', $data)) {
            throw new \InvalidArgumentException('Missing required field pipelineRef');
        }
        $pipelineRef = (string) $data['pipelineRef'];
        if (!array_key_exists('ruleSlug', $data)) {
            throw new \InvalidArgumentException('Missing required field ruleSlug');
        }
        $ruleSlug = (string) $data['ruleSlug'];
        if (!array_key_exists('path', $data)) {
            throw new \InvalidArgumentException('Missing required field path');
        }
        $path = (string) $data['path'];
        if (!array_key_exists('contentType', $data)) {
            throw new \InvalidArgumentException('Missing required field contentType');
        }
        $contentType = (string) $data['contentType'];
        $storageKey = array_key_exists('storageKey', $data)
            ? (string) $data['storageKey']
            : null;
        $cachePolicy = array_key_exists('cachePolicy', $data)
            ? (string) $data['cachePolicy']
            : null;
        $schedule = array_key_exists('schedule', $data)
            ? LifecycleExposureSchedule::fromArray(is_array($data['schedule']) ? $data['schedule'] : [])
            : null;
        return new LifecycleExposureRequest(
            $pipelineRef,
            $ruleSlug,
            $path,
            $contentType,
            $storageKey,
            $cachePolicy,
            $schedule
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['pipelineRef'] = $this->pipelineRef;
        $data['ruleSlug'] = $this->ruleSlug;
        $data['path'] = $this->path;
        $data['contentType'] = $this->contentType;
        if ($this->storageKey !== null) {
            $data['storageKey'] = $this->storageKey;
        }
        if ($this->cachePolicy !== null) {
            $data['cachePolicy'] = $this->cachePolicy;
        }
        if ($this->schedule !== null) {
            $data['schedule'] = $this->schedule->toArray();
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class LifecycleExposureSchedule implements \JsonSerializable
{
    public function __construct(
        public ?string $startsAt = null,
        public ?string $expiresAt = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): LifecycleExposureSchedule
    {
        $startsAt = array_key_exists('startsAt', $data)
            ? (string) $data['startsAt']
            : null;
        $expiresAt = array_key_exists('expiresAt', $data)
            ? (string) $data['expiresAt']
            : null;
        return new LifecycleExposureSchedule(
            $startsAt,
            $expiresAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->startsAt !== null) {
            $data['startsAt'] = $this->startsAt;
        }
        if ($this->expiresAt !== null) {
            $data['expiresAt'] = $this->expiresAt;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class LifecycleRequest implements \JsonSerializable
{
    public function __construct(
        public ?string $reason = null,
        public ?LifecycleRequestExposuresList $exposures = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): LifecycleRequest
    {
        $reason = array_key_exists('reason', $data)
            ? (string) $data['reason']
            : null;
        $exposures = array_key_exists('exposures', $data)
            ? LifecycleRequestExposuresList::fromArray(is_array($data['exposures']) ? $data['exposures'] : [])
            : null;
        return new LifecycleRequest(
            $reason,
            $exposures
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->reason !== null) {
            $data['reason'] = $this->reason;
        }
        if ($this->exposures !== null) {
            $data['exposures'] = $this->exposures->toArray();
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class LifecycleRequestExposuresList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): LifecycleRequestExposuresList
    {
        return new LifecycleRequestExposuresList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class LifecycleResponse implements \JsonSerializable
{
    public function __construct(
        public string $assetId,
        public string $tenantId,
        public string $previousState,
        public string $state,
        public int $lockVersion,
        public string $updatedAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): LifecycleResponse
    {
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('previousState', $data)) {
            throw new \InvalidArgumentException('Missing required field previousState');
        }
        $previousState = (string) $data['previousState'];
        if (!array_key_exists('state', $data)) {
            throw new \InvalidArgumentException('Missing required field state');
        }
        $state = (string) $data['state'];
        if (!array_key_exists('lockVersion', $data)) {
            throw new \InvalidArgumentException('Missing required field lockVersion');
        }
        $lockVersion = (int) $data['lockVersion'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        return new LifecycleResponse(
            $assetId,
            $tenantId,
            $previousState,
            $state,
            $lockVersion,
            $updatedAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['assetId'] = $this->assetId;
        $data['tenantId'] = $this->tenantId;
        $data['previousState'] = $this->previousState;
        $data['state'] = $this->state;
        $data['lockVersion'] = $this->lockVersion;
        $data['updatedAt'] = $this->updatedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class MetadataEntry implements \JsonSerializable
{
    public function __construct(
        public string $key,
        public string $kind,
        public array $value
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): MetadataEntry
    {
        if (!array_key_exists('key', $data)) {
            throw new \InvalidArgumentException('Missing required field key');
        }
        $key = (string) $data['key'];
        if (!array_key_exists('kind', $data)) {
            throw new \InvalidArgumentException('Missing required field kind');
        }
        $kind = (string) $data['kind'];
        if (!array_key_exists('value', $data)) {
            throw new \InvalidArgumentException('Missing required field value');
        }
        $value = is_array($data['value']) ? $data['value'] : [];
        return new MetadataEntry(
            $key,
            $kind,
            $value
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['key'] = $this->key;
        $data['kind'] = $this->kind;
        $data['value'] = $this->value;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class OperationContextPayload implements \JsonSerializable
{
    public function __construct(
        public string $initiator,
        public string $action,
        public string $resourceUrn
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): OperationContextPayload
    {
        if (!array_key_exists('initiator', $data)) {
            throw new \InvalidArgumentException('Missing required field initiator');
        }
        $initiator = (string) $data['initiator'];
        if (!array_key_exists('action', $data)) {
            throw new \InvalidArgumentException('Missing required field action');
        }
        $action = (string) $data['action'];
        if (!array_key_exists('resourceUrn', $data)) {
            throw new \InvalidArgumentException('Missing required field resourceUrn');
        }
        $resourceUrn = (string) $data['resourceUrn'];
        return new OperationContextPayload(
            $initiator,
            $action,
            $resourceUrn
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['initiator'] = $this->initiator;
        $data['action'] = $this->action;
        $data['resourceUrn'] = $this->resourceUrn;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class OperationResponse implements \JsonSerializable
{
    public function __construct(
        public string $operationId,
        public array $status,
        public string $createdAt,
        public string $updatedAt,
        public OperationContextPayload $context,
        public ?string $expiresAt = null,
        public ?array $metadata = null,
        public ?array $result = null,
        public ?array $error = null,
        public ?string $progressStream = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): OperationResponse
    {
        if (!array_key_exists('operationId', $data)) {
            throw new \InvalidArgumentException('Missing required field operationId');
        }
        $operationId = (string) $data['operationId'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = $data['status'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        $expiresAt = array_key_exists('expiresAt', $data)
            ? (string) $data['expiresAt']
            : null;
        if (!array_key_exists('context', $data)) {
            throw new \InvalidArgumentException('Missing required field context');
        }
        $context = OperationContextPayload::fromArray(is_array($data['context']) ? $data['context'] : []);
        $metadata = array_key_exists('metadata', $data)
            ? is_array($data['metadata']) ? $data['metadata'] : []
            : null;
        $result = array_key_exists('result', $data)
            ? is_array($data['result']) ? $data['result'] : []
            : null;
        $error = array_key_exists('error', $data)
            ? is_array($data['error']) ? $data['error'] : []
            : null;
        $progressStream = array_key_exists('progressStream', $data)
            ? (string) $data['progressStream']
            : null;
        return new OperationResponse(
            $operationId,
            $status,
            $createdAt,
            $updatedAt,
            $context,
            $expiresAt,
            $metadata,
            $result,
            $error,
            $progressStream
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['operationId'] = $this->operationId;
        $data['status'] = $this->status;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        if ($this->expiresAt !== null) {
            $data['expiresAt'] = $this->expiresAt;
        }
        $data['context'] = $this->context->toArray();
        if ($this->metadata !== null) {
            $data['metadata'] = $this->metadata;
        }
        if ($this->result !== null) {
            $data['result'] = $this->result;
        }
        if ($this->error !== null) {
            $data['error'] = $this->error;
        }
        if ($this->progressStream !== null) {
            $data['progressStream'] = $this->progressStream;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PendingAssetVersion implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $assetId,
        public string $versionId,
        public int $ordinal,
        public string $storageKey,
        public string $checksumAlgorithm,
        public string $declaredChecksum,
        public int $contentLength,
        public string $status,
        public string $createdAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PendingAssetVersion
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('versionId', $data)) {
            throw new \InvalidArgumentException('Missing required field versionId');
        }
        $versionId = (string) $data['versionId'];
        if (!array_key_exists('ordinal', $data)) {
            throw new \InvalidArgumentException('Missing required field ordinal');
        }
        $ordinal = (int) $data['ordinal'];
        if (!array_key_exists('storageKey', $data)) {
            throw new \InvalidArgumentException('Missing required field storageKey');
        }
        $storageKey = (string) $data['storageKey'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('declaredChecksum', $data)) {
            throw new \InvalidArgumentException('Missing required field declaredChecksum');
        }
        $declaredChecksum = (string) $data['declaredChecksum'];
        if (!array_key_exists('contentLength', $data)) {
            throw new \InvalidArgumentException('Missing required field contentLength');
        }
        $contentLength = (int) $data['contentLength'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        return new PendingAssetVersion(
            $tenantId,
            $assetId,
            $versionId,
            $ordinal,
            $storageKey,
            $checksumAlgorithm,
            $declaredChecksum,
            $contentLength,
            $status,
            $createdAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['assetId'] = $this->assetId;
        $data['versionId'] = $this->versionId;
        $data['ordinal'] = $this->ordinal;
        $data['storageKey'] = $this->storageKey;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['declaredChecksum'] = $this->declaredChecksum;
        $data['contentLength'] = $this->contentLength;
        $data['status'] = $this->status;
        $data['createdAt'] = $this->createdAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PendingUploadVersion implements \JsonSerializable
{
    public function __construct(
        public string $versionId,
        public string $storageKey,
        public string $status,
        public string $checksumAlgorithm,
        public string $checksum,
        public int $contentLength,
        public string $createdAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PendingUploadVersion
    {
        if (!array_key_exists('versionId', $data)) {
            throw new \InvalidArgumentException('Missing required field versionId');
        }
        $versionId = (string) $data['versionId'];
        if (!array_key_exists('storageKey', $data)) {
            throw new \InvalidArgumentException('Missing required field storageKey');
        }
        $storageKey = (string) $data['storageKey'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('checksum', $data)) {
            throw new \InvalidArgumentException('Missing required field checksum');
        }
        $checksum = (string) $data['checksum'];
        if (!array_key_exists('contentLength', $data)) {
            throw new \InvalidArgumentException('Missing required field contentLength');
        }
        $contentLength = (int) $data['contentLength'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        return new PendingUploadVersion(
            $versionId,
            $storageKey,
            $status,
            $checksumAlgorithm,
            $checksum,
            $contentLength,
            $createdAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['versionId'] = $this->versionId;
        $data['storageKey'] = $this->storageKey;
        $data['status'] = $this->status;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['checksum'] = $this->checksum;
        $data['contentLength'] = $this->contentLength;
        $data['createdAt'] = $this->createdAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineListResponse implements \JsonSerializable
{
    public function __construct(
        public PipelineListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = PipelineListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new PipelineListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): PipelineListResponseItemsList
    {
        return new PipelineListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRecordResponse implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $pipelineId,
        public string $pipelineRef,
        public string $displayName,
        public bool $enabled,
        public PipelineRecordResponseRenditionsList $renditions,
        public PipelineRecordResponseRulesList $rules,
        public string $createdAt,
        public string $updatedAt,
        public int $lockVersion,
        public ?string $notes = null,
        public ?string $pipelinePrefix = null,
        public ?string $cdnHost = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRecordResponse
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('pipelineId', $data)) {
            throw new \InvalidArgumentException('Missing required field pipelineId');
        }
        $pipelineId = (string) $data['pipelineId'];
        if (!array_key_exists('pipelineRef', $data)) {
            throw new \InvalidArgumentException('Missing required field pipelineRef');
        }
        $pipelineRef = (string) $data['pipelineRef'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $notes = array_key_exists('notes', $data)
            ? (string) $data['notes']
            : null;
        $pipelinePrefix = array_key_exists('pipelinePrefix', $data)
            ? (string) $data['pipelinePrefix']
            : null;
        $cdnHost = array_key_exists('cdnHost', $data)
            ? (string) $data['cdnHost']
            : null;
        if (!array_key_exists('enabled', $data)) {
            throw new \InvalidArgumentException('Missing required field enabled');
        }
        $enabled = (bool) $data['enabled'];
        if (!array_key_exists('renditions', $data)) {
            throw new \InvalidArgumentException('Missing required field renditions');
        }
        $renditions = PipelineRecordResponseRenditionsList::fromArray(is_array($data['renditions']) ? $data['renditions'] : []);
        if (!array_key_exists('rules', $data)) {
            throw new \InvalidArgumentException('Missing required field rules');
        }
        $rules = PipelineRecordResponseRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : []);
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('lockVersion', $data)) {
            throw new \InvalidArgumentException('Missing required field lockVersion');
        }
        $lockVersion = (int) $data['lockVersion'];
        return new PipelineRecordResponse(
            $tenantId,
            $pipelineId,
            $pipelineRef,
            $displayName,
            $enabled,
            $renditions,
            $rules,
            $createdAt,
            $updatedAt,
            $lockVersion,
            $notes,
            $pipelinePrefix,
            $cdnHost
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['pipelineId'] = $this->pipelineId;
        $data['pipelineRef'] = $this->pipelineRef;
        $data['displayName'] = $this->displayName;
        if ($this->notes !== null) {
            $data['notes'] = $this->notes;
        }
        if ($this->pipelinePrefix !== null) {
            $data['pipelinePrefix'] = $this->pipelinePrefix;
        }
        if ($this->cdnHost !== null) {
            $data['cdnHost'] = $this->cdnHost;
        }
        $data['enabled'] = $this->enabled;
        $data['renditions'] = $this->renditions->toArray();
        $data['rules'] = $this->rules->toArray();
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['lockVersion'] = $this->lockVersion;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRecordResponseRenditionsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): PipelineRecordResponseRenditionsList
    {
        return new PipelineRecordResponseRenditionsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRecordResponseRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): PipelineRecordResponseRulesList
    {
        return new PipelineRecordResponseRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRenditionRequest implements \JsonSerializable
{
    public function __construct(
        public string $name,
        public string $pipeline,
        public string $contentType
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRenditionRequest
    {
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        if (!array_key_exists('pipeline', $data)) {
            throw new \InvalidArgumentException('Missing required field pipeline');
        }
        $pipeline = (string) $data['pipeline'];
        if (!array_key_exists('contentType', $data)) {
            throw new \InvalidArgumentException('Missing required field contentType');
        }
        $contentType = (string) $data['contentType'];
        return new PipelineRenditionRequest(
            $name,
            $pipeline,
            $contentType
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['name'] = $this->name;
        $data['pipeline'] = $this->pipeline;
        $data['contentType'] = $this->contentType;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRenditionResponse implements \JsonSerializable
{
    public function __construct(
        public string $name,
        public string $pipeline,
        public string $contentType
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRenditionResponse
    {
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        if (!array_key_exists('pipeline', $data)) {
            throw new \InvalidArgumentException('Missing required field pipeline');
        }
        $pipeline = (string) $data['pipeline'];
        if (!array_key_exists('contentType', $data)) {
            throw new \InvalidArgumentException('Missing required field contentType');
        }
        $contentType = (string) $data['contentType'];
        return new PipelineRenditionResponse(
            $name,
            $pipeline,
            $contentType
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['name'] = $this->name;
        $data['pipeline'] = $this->pipeline;
        $data['contentType'] = $this->contentType;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRerunRequest implements \JsonSerializable
{
    public function __construct(
        public ?string $pipelineRef = null,
        public ?string $profile = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRerunRequest
    {
        $pipelineRef = array_key_exists('pipelineRef', $data)
            ? (string) $data['pipelineRef']
            : null;
        $profile = array_key_exists('profile', $data)
            ? (string) $data['profile']
            : null;
        return new PipelineRerunRequest(
            $pipelineRef,
            $profile
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->pipelineRef !== null) {
            $data['pipelineRef'] = $this->pipelineRef;
        }
        if ($this->profile !== null) {
            $data['profile'] = $this->profile;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRerunResponse implements \JsonSerializable
{
    public function __construct(
        public PipelineRerunResponseOperationsList $operations,
        public int $matchedAssets,
        public int $queuedJobs,
        public int $skippedAssets,
        public int $failedAssets
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRerunResponse
    {
        if (!array_key_exists('operations', $data)) {
            throw new \InvalidArgumentException('Missing required field operations');
        }
        $operations = PipelineRerunResponseOperationsList::fromArray(is_array($data['operations']) ? $data['operations'] : []);
        if (!array_key_exists('matchedAssets', $data)) {
            throw new \InvalidArgumentException('Missing required field matchedAssets');
        }
        $matchedAssets = (int) $data['matchedAssets'];
        if (!array_key_exists('queuedJobs', $data)) {
            throw new \InvalidArgumentException('Missing required field queuedJobs');
        }
        $queuedJobs = (int) $data['queuedJobs'];
        if (!array_key_exists('skippedAssets', $data)) {
            throw new \InvalidArgumentException('Missing required field skippedAssets');
        }
        $skippedAssets = (int) $data['skippedAssets'];
        if (!array_key_exists('failedAssets', $data)) {
            throw new \InvalidArgumentException('Missing required field failedAssets');
        }
        $failedAssets = (int) $data['failedAssets'];
        return new PipelineRerunResponse(
            $operations,
            $matchedAssets,
            $queuedJobs,
            $skippedAssets,
            $failedAssets
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['operations'] = $this->operations->toArray();
        $data['matchedAssets'] = $this->matchedAssets;
        $data['queuedJobs'] = $this->queuedJobs;
        $data['skippedAssets'] = $this->skippedAssets;
        $data['failedAssets'] = $this->failedAssets;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRerunResponseOperationsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): PipelineRerunResponseOperationsList
    {
        return new PipelineRerunResponseOperationsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRuleRequest implements \JsonSerializable
{
    public function __construct(
        public string $field,
        public string $operator,
        public array $value
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRuleRequest
    {
        if (!array_key_exists('field', $data)) {
            throw new \InvalidArgumentException('Missing required field field');
        }
        $field = (string) $data['field'];
        if (!array_key_exists('operator', $data)) {
            throw new \InvalidArgumentException('Missing required field operator');
        }
        $operator = (string) $data['operator'];
        if (!array_key_exists('value', $data)) {
            throw new \InvalidArgumentException('Missing required field value');
        }
        $value = is_array($data['value']) ? $data['value'] : [];
        return new PipelineRuleRequest(
            $field,
            $operator,
            $value
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['field'] = $this->field;
        $data['operator'] = $this->operator;
        $data['value'] = $this->value;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class PipelineRuleResponse implements \JsonSerializable
{
    public function __construct(
        public string $field,
        public string $operator,
        public array $value
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): PipelineRuleResponse
    {
        if (!array_key_exists('field', $data)) {
            throw new \InvalidArgumentException('Missing required field field');
        }
        $field = (string) $data['field'];
        if (!array_key_exists('operator', $data)) {
            throw new \InvalidArgumentException('Missing required field operator');
        }
        $operator = (string) $data['operator'];
        if (!array_key_exists('value', $data)) {
            throw new \InvalidArgumentException('Missing required field value');
        }
        $value = is_array($data['value']) ? $data['value'] : [];
        return new PipelineRuleResponse(
            $field,
            $operator,
            $value
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['field'] = $this->field;
        $data['operator'] = $this->operator;
        $data['value'] = $this->value;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ProcessorCallbackPayload implements \JsonSerializable
{
    public function __construct(
        public string $status,
        public string $jobId,
        public string $tenantId,
        public string $pipelineRef,
        public ?string $profile = null,
        public ?string $storageKey = null,
        public ?string $checksumSha256 = null,
        public ?int $sizeBytes = null,
        public ?string $contentType = null,
        public ?string $assetId = null,
        public ?string $versionId = null,
        public ?array $metadata = null,
        public ?array $diagnostics = null,
        public ?string $pipelineFingerprint = null,
        public ?array $cacheHints = null,
        public ?string $error = null,
        public ?int $computeMillis = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): ProcessorCallbackPayload
    {
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('jobId', $data)) {
            throw new \InvalidArgumentException('Missing required field jobId');
        }
        $jobId = (string) $data['jobId'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('pipelineRef', $data)) {
            throw new \InvalidArgumentException('Missing required field pipelineRef');
        }
        $pipelineRef = (string) $data['pipelineRef'];
        $profile = array_key_exists('profile', $data)
            ? (string) $data['profile']
            : null;
        $storageKey = array_key_exists('storageKey', $data)
            ? (string) $data['storageKey']
            : null;
        $checksumSha256 = array_key_exists('checksumSha256', $data)
            ? (string) $data['checksumSha256']
            : null;
        $sizeBytes = array_key_exists('sizeBytes', $data)
            ? (int) $data['sizeBytes']
            : null;
        $contentType = array_key_exists('contentType', $data)
            ? (string) $data['contentType']
            : null;
        $assetId = array_key_exists('assetId', $data)
            ? (string) $data['assetId']
            : null;
        $versionId = array_key_exists('versionId', $data)
            ? (string) $data['versionId']
            : null;
        $metadata = array_key_exists('metadata', $data)
            ? is_array($data['metadata']) ? $data['metadata'] : []
            : null;
        $diagnostics = array_key_exists('diagnostics', $data)
            ? is_array($data['diagnostics']) ? $data['diagnostics'] : []
            : null;
        $pipelineFingerprint = array_key_exists('pipelineFingerprint', $data)
            ? (string) $data['pipelineFingerprint']
            : null;
        $cacheHints = array_key_exists('cacheHints', $data)
            ? is_array($data['cacheHints']) ? $data['cacheHints'] : []
            : null;
        $error = array_key_exists('error', $data)
            ? (string) $data['error']
            : null;
        $computeMillis = array_key_exists('computeMillis', $data)
            ? (int) $data['computeMillis']
            : null;
        return new ProcessorCallbackPayload(
            $status,
            $jobId,
            $tenantId,
            $pipelineRef,
            $profile,
            $storageKey,
            $checksumSha256,
            $sizeBytes,
            $contentType,
            $assetId,
            $versionId,
            $metadata,
            $diagnostics,
            $pipelineFingerprint,
            $cacheHints,
            $error,
            $computeMillis
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['status'] = $this->status;
        $data['jobId'] = $this->jobId;
        $data['tenantId'] = $this->tenantId;
        $data['pipelineRef'] = $this->pipelineRef;
        if ($this->profile !== null) {
            $data['profile'] = $this->profile;
        }
        if ($this->storageKey !== null) {
            $data['storageKey'] = $this->storageKey;
        }
        if ($this->checksumSha256 !== null) {
            $data['checksumSha256'] = $this->checksumSha256;
        }
        if ($this->sizeBytes !== null) {
            $data['sizeBytes'] = $this->sizeBytes;
        }
        if ($this->contentType !== null) {
            $data['contentType'] = $this->contentType;
        }
        if ($this->assetId !== null) {
            $data['assetId'] = $this->assetId;
        }
        if ($this->versionId !== null) {
            $data['versionId'] = $this->versionId;
        }
        if ($this->metadata !== null) {
            $data['metadata'] = $this->metadata;
        }
        if ($this->diagnostics !== null) {
            $data['diagnostics'] = $this->diagnostics;
        }
        if ($this->pipelineFingerprint !== null) {
            $data['pipelineFingerprint'] = $this->pipelineFingerprint;
        }
        if ($this->cacheHints !== null) {
            $data['cacheHints'] = $this->cacheHints;
        }
        if ($this->error !== null) {
            $data['error'] = $this->error;
        }
        if ($this->computeMillis !== null) {
            $data['computeMillis'] = $this->computeMillis;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class RegisteredAsset implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $bucketName,
        public string $assetId,
        public string $createdAt,
        public string $updatedAt,
        public array $metadata
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): RegisteredAsset
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('bucketName', $data)) {
            throw new \InvalidArgumentException('Missing required field bucketName');
        }
        $bucketName = (string) $data['bucketName'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('metadata', $data)) {
            throw new \InvalidArgumentException('Missing required field metadata');
        }
        $metadata = is_array($data['metadata']) ? $data['metadata'] : [];
        return new RegisteredAsset(
            $tenantId,
            $bucketName,
            $assetId,
            $createdAt,
            $updatedAt,
            $metadata
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['bucketName'] = $this->bucketName;
        $data['assetId'] = $this->assetId;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['metadata'] = $this->metadata;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumListResponse implements \JsonSerializable
{
    public function __construct(
        public SmartAlbumListResponseItemsList $items
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): SmartAlbumListResponse
    {
        if (!array_key_exists('items', $data)) {
            throw new \InvalidArgumentException('Missing required field items');
        }
        $items = SmartAlbumListResponseItemsList::fromArray(is_array($data['items']) ? $data['items'] : []);
        return new SmartAlbumListResponse(
            $items
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['items'] = $this->items->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumListResponseItemsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): SmartAlbumListResponseItemsList
    {
        return new SmartAlbumListResponseItemsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumRecordResponse implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $albumId,
        public string $displayName,
        public array $definition,
        public string $createdAt,
        public string $updatedAt,
        public int $lockVersion,
        public ?string $description = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): SmartAlbumRecordResponse
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('albumId', $data)) {
            throw new \InvalidArgumentException('Missing required field albumId');
        }
        $albumId = (string) $data['albumId'];
        if (!array_key_exists('displayName', $data)) {
            throw new \InvalidArgumentException('Missing required field displayName');
        }
        $displayName = (string) $data['displayName'];
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        if (!array_key_exists('definition', $data)) {
            throw new \InvalidArgumentException('Missing required field definition');
        }
        $definition = is_array($data['definition']) ? $data['definition'] : [];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('lockVersion', $data)) {
            throw new \InvalidArgumentException('Missing required field lockVersion');
        }
        $lockVersion = (int) $data['lockVersion'];
        return new SmartAlbumRecordResponse(
            $tenantId,
            $albumId,
            $displayName,
            $definition,
            $createdAt,
            $updatedAt,
            $lockVersion,
            $description
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['albumId'] = $this->albumId;
        $data['displayName'] = $this->displayName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        $data['definition'] = $this->definition;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['lockVersion'] = $this->lockVersion;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumResponse implements \JsonSerializable
{
    public function __construct(
        public SmartAlbumRecordResponse $album,
        public SmartAlbumResponseRulesList $rules
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): SmartAlbumResponse
    {
        if (!array_key_exists('album', $data)) {
            throw new \InvalidArgumentException('Missing required field album');
        }
        $album = SmartAlbumRecordResponse::fromArray(is_array($data['album']) ? $data['album'] : []);
        if (!array_key_exists('rules', $data)) {
            throw new \InvalidArgumentException('Missing required field rules');
        }
        $rules = SmartAlbumResponseRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : []);
        return new SmartAlbumResponse(
            $album,
            $rules
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['album'] = $this->album->toArray();
        $data['rules'] = $this->rules->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumResponseRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): SmartAlbumResponseRulesList
    {
        return new SmartAlbumResponseRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumRuleRequest implements \JsonSerializable
{
    public function __construct(
        public string $field,
        public string $operator,
        public array $value,
        public ?string $ruleId = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): SmartAlbumRuleRequest
    {
        $ruleId = array_key_exists('ruleId', $data)
            ? (string) $data['ruleId']
            : null;
        if (!array_key_exists('field', $data)) {
            throw new \InvalidArgumentException('Missing required field field');
        }
        $field = (string) $data['field'];
        if (!array_key_exists('operator', $data)) {
            throw new \InvalidArgumentException('Missing required field operator');
        }
        $operator = (string) $data['operator'];
        if (!array_key_exists('value', $data)) {
            throw new \InvalidArgumentException('Missing required field value');
        }
        $value = is_array($data['value']) ? $data['value'] : [];
        return new SmartAlbumRuleRequest(
            $field,
            $operator,
            $value,
            $ruleId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->ruleId !== null) {
            $data['ruleId'] = $this->ruleId;
        }
        $data['field'] = $this->field;
        $data['operator'] = $this->operator;
        $data['value'] = $this->value;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class SmartAlbumRuleResponse implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $albumId,
        public string $ruleId,
        public string $field,
        public string $operator,
        public array $value,
        public string $createdAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): SmartAlbumRuleResponse
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('albumId', $data)) {
            throw new \InvalidArgumentException('Missing required field albumId');
        }
        $albumId = (string) $data['albumId'];
        if (!array_key_exists('ruleId', $data)) {
            throw new \InvalidArgumentException('Missing required field ruleId');
        }
        $ruleId = (string) $data['ruleId'];
        if (!array_key_exists('field', $data)) {
            throw new \InvalidArgumentException('Missing required field field');
        }
        $field = (string) $data['field'];
        if (!array_key_exists('operator', $data)) {
            throw new \InvalidArgumentException('Missing required field operator');
        }
        $operator = (string) $data['operator'];
        if (!array_key_exists('value', $data)) {
            throw new \InvalidArgumentException('Missing required field value');
        }
        $value = is_array($data['value']) ? $data['value'] : [];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        return new SmartAlbumRuleResponse(
            $tenantId,
            $albumId,
            $ruleId,
            $field,
            $operator,
            $value,
            $createdAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['albumId'] = $this->albumId;
        $data['ruleId'] = $this->ruleId;
        $data['field'] = $this->field;
        $data['operator'] = $this->operator;
        $data['value'] = $this->value;
        $data['createdAt'] = $this->createdAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdateCollectionRequest implements \JsonSerializable
{
    public function __construct(
        public ?string $displayName = null,
        public ?string $description = null,
        public ?int $expectedLockVersion = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UpdateCollectionRequest
    {
        $displayName = array_key_exists('displayName', $data)
            ? (string) $data['displayName']
            : null;
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        $expectedLockVersion = array_key_exists('expectedLockVersion', $data)
            ? (int) $data['expectedLockVersion']
            : null;
        return new UpdateCollectionRequest(
            $displayName,
            $description,
            $expectedLockVersion
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->displayName !== null) {
            $data['displayName'] = $this->displayName;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->expectedLockVersion !== null) {
            $data['expectedLockVersion'] = $this->expectedLockVersion;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdatePipelineRequest implements \JsonSerializable
{
    public function __construct(
        public ?string $displayName = null,
        public ?string $notes = null,
        public ?string $pipelinePrefix = null,
        public ?string $cdnHost = null,
        public ?bool $enabled = null,
        public ?UpdatePipelineRequestRenditionsList $renditions = null,
        public ?UpdatePipelineRequestRulesList $rules = null,
        public ?int $expectedLockVersion = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UpdatePipelineRequest
    {
        $displayName = array_key_exists('displayName', $data)
            ? (string) $data['displayName']
            : null;
        $notes = array_key_exists('notes', $data)
            ? (string) $data['notes']
            : null;
        $pipelinePrefix = array_key_exists('pipelinePrefix', $data)
            ? (string) $data['pipelinePrefix']
            : null;
        $cdnHost = array_key_exists('cdnHost', $data)
            ? (string) $data['cdnHost']
            : null;
        $enabled = array_key_exists('enabled', $data)
            ? (bool) $data['enabled']
            : null;
        $renditions = array_key_exists('renditions', $data)
            ? UpdatePipelineRequestRenditionsList::fromArray(is_array($data['renditions']) ? $data['renditions'] : [])
            : null;
        $rules = array_key_exists('rules', $data)
            ? UpdatePipelineRequestRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : [])
            : null;
        $expectedLockVersion = array_key_exists('expectedLockVersion', $data)
            ? (int) $data['expectedLockVersion']
            : null;
        return new UpdatePipelineRequest(
            $displayName,
            $notes,
            $pipelinePrefix,
            $cdnHost,
            $enabled,
            $renditions,
            $rules,
            $expectedLockVersion
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->displayName !== null) {
            $data['displayName'] = $this->displayName;
        }
        if ($this->notes !== null) {
            $data['notes'] = $this->notes;
        }
        if ($this->pipelinePrefix !== null) {
            $data['pipelinePrefix'] = $this->pipelinePrefix;
        }
        if ($this->cdnHost !== null) {
            $data['cdnHost'] = $this->cdnHost;
        }
        if ($this->enabled !== null) {
            $data['enabled'] = $this->enabled;
        }
        if ($this->renditions !== null) {
            $data['renditions'] = $this->renditions->toArray();
        }
        if ($this->rules !== null) {
            $data['rules'] = $this->rules->toArray();
        }
        if ($this->expectedLockVersion !== null) {
            $data['expectedLockVersion'] = $this->expectedLockVersion;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdatePipelineRequestRenditionsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): UpdatePipelineRequestRenditionsList
    {
        return new UpdatePipelineRequestRenditionsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdatePipelineRequestRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): UpdatePipelineRequestRulesList
    {
        return new UpdatePipelineRequestRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdateSmartAlbumRequest implements \JsonSerializable
{
    public function __construct(
        public UpdateSmartAlbumRequestRulesList $rules,
        public ?string $displayName = null,
        public ?string $description = null,
        public ?array $definition = null,
        public ?int $expectedLockVersion = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UpdateSmartAlbumRequest
    {
        $displayName = array_key_exists('displayName', $data)
            ? (string) $data['displayName']
            : null;
        $description = array_key_exists('description', $data)
            ? (string) $data['description']
            : null;
        $definition = array_key_exists('definition', $data)
            ? is_array($data['definition']) ? $data['definition'] : []
            : null;
        $expectedLockVersion = array_key_exists('expectedLockVersion', $data)
            ? (int) $data['expectedLockVersion']
            : null;
        if (!array_key_exists('rules', $data)) {
            throw new \InvalidArgumentException('Missing required field rules');
        }
        $rules = UpdateSmartAlbumRequestRulesList::fromArray(is_array($data['rules']) ? $data['rules'] : []);
        return new UpdateSmartAlbumRequest(
            $rules,
            $displayName,
            $description,
            $definition,
            $expectedLockVersion
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->displayName !== null) {
            $data['displayName'] = $this->displayName;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->definition !== null) {
            $data['definition'] = $this->definition;
        }
        if ($this->expectedLockVersion !== null) {
            $data['expectedLockVersion'] = $this->expectedLockVersion;
        }
        $data['rules'] = $this->rules->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdateSmartAlbumRequestRulesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): UpdateSmartAlbumRequestRulesList
    {
        return new UpdateSmartAlbumRequestRulesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UploadedAssetVersion implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $assetId,
        public string $versionId,
        public int $ordinal,
        public string $storageKey,
        public string $checksumAlgorithm,
        public string $checksum,
        public int $sizeBytes,
        public string $status,
        public string $createdAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UploadedAssetVersion
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('assetId', $data)) {
            throw new \InvalidArgumentException('Missing required field assetId');
        }
        $assetId = (string) $data['assetId'];
        if (!array_key_exists('versionId', $data)) {
            throw new \InvalidArgumentException('Missing required field versionId');
        }
        $versionId = (string) $data['versionId'];
        if (!array_key_exists('ordinal', $data)) {
            throw new \InvalidArgumentException('Missing required field ordinal');
        }
        $ordinal = (int) $data['ordinal'];
        if (!array_key_exists('storageKey', $data)) {
            throw new \InvalidArgumentException('Missing required field storageKey');
        }
        $storageKey = (string) $data['storageKey'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('checksum', $data)) {
            throw new \InvalidArgumentException('Missing required field checksum');
        }
        $checksum = (string) $data['checksum'];
        if (!array_key_exists('sizeBytes', $data)) {
            throw new \InvalidArgumentException('Missing required field sizeBytes');
        }
        $sizeBytes = (int) $data['sizeBytes'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        return new UploadedAssetVersion(
            $tenantId,
            $assetId,
            $versionId,
            $ordinal,
            $storageKey,
            $checksumAlgorithm,
            $checksum,
            $sizeBytes,
            $status,
            $createdAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        $data['assetId'] = $this->assetId;
        $data['versionId'] = $this->versionId;
        $data['ordinal'] = $this->ordinal;
        $data['storageKey'] = $this->storageKey;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['checksum'] = $this->checksum;
        $data['sizeBytes'] = $this->sizeBytes;
        $data['status'] = $this->status;
        $data['createdAt'] = $this->createdAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UploadedVersionPayload implements \JsonSerializable
{
    public function __construct(
        public string $versionId,
        public int $ordinal,
        public string $storageKey,
        public string $checksumAlgorithm,
        public string $checksum,
        public int $sizeBytes,
        public string $status,
        public string $createdAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UploadedVersionPayload
    {
        if (!array_key_exists('versionId', $data)) {
            throw new \InvalidArgumentException('Missing required field versionId');
        }
        $versionId = (string) $data['versionId'];
        if (!array_key_exists('ordinal', $data)) {
            throw new \InvalidArgumentException('Missing required field ordinal');
        }
        $ordinal = (int) $data['ordinal'];
        if (!array_key_exists('storageKey', $data)) {
            throw new \InvalidArgumentException('Missing required field storageKey');
        }
        $storageKey = (string) $data['storageKey'];
        if (!array_key_exists('checksumAlgorithm', $data)) {
            throw new \InvalidArgumentException('Missing required field checksumAlgorithm');
        }
        $checksumAlgorithm = (string) $data['checksumAlgorithm'];
        if (!array_key_exists('checksum', $data)) {
            throw new \InvalidArgumentException('Missing required field checksum');
        }
        $checksum = (string) $data['checksum'];
        if (!array_key_exists('sizeBytes', $data)) {
            throw new \InvalidArgumentException('Missing required field sizeBytes');
        }
        $sizeBytes = (int) $data['sizeBytes'];
        if (!array_key_exists('status', $data)) {
            throw new \InvalidArgumentException('Missing required field status');
        }
        $status = (string) $data['status'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        return new UploadedVersionPayload(
            $versionId,
            $ordinal,
            $storageKey,
            $checksumAlgorithm,
            $checksum,
            $sizeBytes,
            $status,
            $createdAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['versionId'] = $this->versionId;
        $data['ordinal'] = $this->ordinal;
        $data['storageKey'] = $this->storageKey;
        $data['checksumAlgorithm'] = $this->checksumAlgorithm;
        $data['checksum'] = $this->checksum;
        $data['sizeBytes'] = $this->sizeBytes;
        $data['status'] = $this->status;
        $data['createdAt'] = $this->createdAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UploadTicket implements \JsonSerializable
{
    public function __construct(
        public string $uploadUrl,
        public string $uploadToken,
        public string $expiresAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UploadTicket
    {
        if (!array_key_exists('uploadUrl', $data)) {
            throw new \InvalidArgumentException('Missing required field uploadUrl');
        }
        $uploadUrl = (string) $data['uploadUrl'];
        if (!array_key_exists('uploadToken', $data)) {
            throw new \InvalidArgumentException('Missing required field uploadToken');
        }
        $uploadToken = (string) $data['uploadToken'];
        if (!array_key_exists('expiresAt', $data)) {
            throw new \InvalidArgumentException('Missing required field expiresAt');
        }
        $expiresAt = (string) $data['expiresAt'];
        return new UploadTicket(
            $uploadUrl,
            $uploadToken,
            $expiresAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['uploadUrl'] = $this->uploadUrl;
        $data['uploadToken'] = $this->uploadToken;
        $data['expiresAt'] = $this->expiresAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class Types
{
}
