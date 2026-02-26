<?php

declare(strict_types=1);

namespace NimbusSdk\DamManagement;

use NimbusSdk\Core\AdditionalSuccessResponseSpec;
use NimbusSdk\Core\NimbusClient;
use NimbusSdk\Core\OperationHandle;
use NimbusSdk\Core\OperationSpec;
use NimbusSdk\Core\PaginationSpec;
use NimbusSdk\Core\SdkConfig;
use NimbusSdk\Core\SdkHttpMethod;
use NimbusSdk\Core\InvalidPathError;

final class DamManagementServiceClient
{
    public function __construct(private NimbusClient $inner)
    {
    }

    public static function fromConfig(SdkConfig $config): DamManagementServiceClient
    {
        return new DamManagementServiceClient(new NimbusClient($config));
    }

    public function innerClient(): NimbusClient
    {
        return $this->inner;
    }

    public function archiveAsset(array $params, LifecycleRequest|array $body): LifecycleResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $normalizedBody = $body instanceof LifecycleRequest ? $body : LifecycleRequest::fromArray($body);
        $result = $this->inner->invoke(self::archiveAssetSpec(), $pathParams, $normalizedBody->toArray());
        return LifecycleResponse::fromArray((array) $result->body);
    }

    public function beginAssetIngestion(IngestionRequest|array $body): IngestionResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof IngestionRequest ? $body : IngestionRequest::fromArray($body);
        $result = $this->inner->invoke(self::beginAssetIngestionSpec(), $pathParams, $normalizedBody->toArray());
        return IngestionResponse::fromArray((array) $result->body);
    }

    public function completeAssetIngestion(CompleteIngestionRequest|array $body): OperationResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CompleteIngestionRequest ? $body : CompleteIngestionRequest::fromArray($body);
        $result = $this->inner->invoke(self::completeAssetIngestionSpec(), $pathParams, $normalizedBody->toArray());
        return OperationResponse::fromArray((array) $result->body);
    }

    public function createAssetDownload(array $params): AssetDownloadResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $result = $this->inner->invoke(self::createAssetDownloadSpec(), $pathParams, null);
        return AssetDownloadResponse::fromArray((array) $result->body);
    }

    public function createAssetPrefix(CreateAssetPrefixRequest|array $body): AssetPrefixResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CreateAssetPrefixRequest ? $body : CreateAssetPrefixRequest::fromArray($body);
        $result = $this->inner->invoke(self::createAssetPrefixSpec(), $pathParams, $normalizedBody->toArray());
        return AssetPrefixResponse::fromArray((array) $result->body);
    }

    public function createAssetRenditionDownload(array $params): AssetDownloadResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        if (!array_key_exists('rendition_id', $params)) {
            throw new InvalidPathError('rendition_id');
        }
        $pathParams['rendition_id'] = (string) $params['rendition_id'];
        $result = $this->inner->invoke(self::createAssetRenditionDownloadSpec(), $pathParams, null);
        return AssetDownloadResponse::fromArray((array) $result->body);
    }

    public function createBucket(CreateBucketRequest|array $body): BucketRecord
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CreateBucketRequest ? $body : CreateBucketRequest::fromArray($body);
        $result = $this->inner->invoke(self::createBucketSpec(), $pathParams, $normalizedBody->toArray());
        return BucketRecord::fromArray((array) $result->body);
    }

    public function createCollection(CreateCollectionRequest|array $body): CollectionResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CreateCollectionRequest ? $body : CreateCollectionRequest::fromArray($body);
        $result = $this->inner->invoke(self::createCollectionSpec(), $pathParams, $normalizedBody->toArray());
        return CollectionResponse::fromArray((array) $result->body);
    }

    public function createPipeline(CreatePipelineRequest|array $body): PipelineRecordResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CreatePipelineRequest ? $body : CreatePipelineRequest::fromArray($body);
        $result = $this->inner->invoke(self::createPipelineSpec(), $pathParams, $normalizedBody->toArray());
        return PipelineRecordResponse::fromArray((array) $result->body);
    }

    public function createSmartAlbum(CreateSmartAlbumRequest|array $body): SmartAlbumResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof CreateSmartAlbumRequest ? $body : CreateSmartAlbumRequest::fromArray($body);
        $result = $this->inner->invoke(self::createSmartAlbumSpec(), $pathParams, $normalizedBody->toArray());
        return SmartAlbumResponse::fromArray((array) $result->body);
    }

    public function deleteAsset(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $result = $this->inner->invoke(self::deleteAssetSpec(), $pathParams, null);
        return $result->body;
    }

    public function deleteAssetPrefix(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('prefix_id', $params)) {
            throw new InvalidPathError('prefix_id');
        }
        $pathParams['prefix_id'] = (string) $params['prefix_id'];
        $result = $this->inner->invoke(self::deleteAssetPrefixSpec(), $pathParams, null);
        return $result->body;
    }

    public function deleteBucket(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('bucket_name', $params)) {
            throw new InvalidPathError('bucket_name');
        }
        $pathParams['bucket_name'] = (string) $params['bucket_name'];
        $result = $this->inner->invoke(self::deleteBucketSpec(), $pathParams, null);
        return $result->body;
    }

    public function deleteCollection(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('collection_id', $params)) {
            throw new InvalidPathError('collection_id');
        }
        $pathParams['collection_id'] = (string) $params['collection_id'];
        $result = $this->inner->invoke(self::deleteCollectionSpec(), $pathParams, null);
        return $result->body;
    }

    public function deletePipeline(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('pipeline_id', $params)) {
            throw new InvalidPathError('pipeline_id');
        }
        $pathParams['pipeline_id'] = (string) $params['pipeline_id'];
        $result = $this->inner->invoke(self::deletePipelineSpec(), $pathParams, null);
        return $result->body;
    }

    public function deleteSmartAlbum(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('album_id', $params)) {
            throw new InvalidPathError('album_id');
        }
        $pathParams['album_id'] = (string) $params['album_id'];
        $result = $this->inner->invoke(self::deleteSmartAlbumSpec(), $pathParams, null);
        return $result->body;
    }

    public function getAsset(array $params): AssetDetailResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $result = $this->inner->invoke(self::getAssetSpec(), $pathParams, null);
        return AssetDetailResponse::fromArray((array) $result->body);
    }

    public function getAssetRendition(array $params): AssetRenditionRecord
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        if (!array_key_exists('rendition_id', $params)) {
            throw new InvalidPathError('rendition_id');
        }
        $pathParams['rendition_id'] = (string) $params['rendition_id'];
        $result = $this->inner->invoke(self::getAssetRenditionSpec(), $pathParams, null);
        return AssetRenditionRecord::fromArray((array) $result->body);
    }

    public function getAssetVersionMetadata(array $params): AssetVersionMetadataResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        if (!array_key_exists('version_id', $params)) {
            throw new InvalidPathError('version_id');
        }
        $pathParams['version_id'] = (string) $params['version_id'];
        $result = $this->inner->invoke(self::getAssetVersionMetadataSpec(), $pathParams, null);
        return AssetVersionMetadataResponse::fromArray((array) $result->body);
    }

    public function getOperation(array $params): OperationResponse
    {
        $pathParams = [];
        if (!array_key_exists('operation_id', $params)) {
            throw new InvalidPathError('operation_id');
        }
        $pathParams['operation_id'] = (string) $params['operation_id'];
        $result = $this->inner->invoke(self::getOperationSpec(), $pathParams, null);
        return OperationResponse::fromArray((array) $result->body);
    }

    public function listAssetPrefixes(): AssetPrefixListResponse
    {
        $pathParams = [];
        $result = $this->inner->invoke(self::listAssetPrefixesSpec(), $pathParams, null);
        return AssetPrefixListResponse::fromArray((array) $result->body);
    }

    public function listAssetRenditions(array $params): AssetRenditionListResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $result = $this->inner->invoke(self::listAssetRenditionsSpec(), $pathParams, null);
        return AssetRenditionListResponse::fromArray((array) $result->body);
    }

    public function listBuckets(): BucketListResponse
    {
        $pathParams = [];
        $result = $this->inner->invoke(self::listBucketsSpec(), $pathParams, null);
        return BucketListResponse::fromArray((array) $result->body);
    }

    public function listCollectionMemberships(array $params): CollectionMembershipListResponse
    {
        $pathParams = [];
        if (!array_key_exists('collection_id', $params)) {
            throw new InvalidPathError('collection_id');
        }
        $pathParams['collection_id'] = (string) $params['collection_id'];
        $result = $this->inner->invoke(self::listCollectionMembershipsSpec(), $pathParams, null);
        return CollectionMembershipListResponse::fromArray((array) $result->body);
    }

    public function listCollections(): CollectionListResponse
    {
        $pathParams = [];
        $result = $this->inner->invoke(self::listCollectionsSpec(), $pathParams, null);
        return CollectionListResponse::fromArray((array) $result->body);
    }

    public function listPipelines(): PipelineListResponse
    {
        $pathParams = [];
        $result = $this->inner->invoke(self::listPipelinesSpec(), $pathParams, null);
        return PipelineListResponse::fromArray((array) $result->body);
    }

    public function listSmartAlbums(): SmartAlbumListResponse
    {
        $pathParams = [];
        $result = $this->inner->invoke(self::listSmartAlbumsSpec(), $pathParams, null);
        return SmartAlbumListResponse::fromArray((array) $result->body);
    }

    public function operationCallback(array $params, ProcessorCallbackPayload|array $body): mixed
    {
        $pathParams = [];
        if (!array_key_exists('token', $params)) {
            throw new InvalidPathError('token');
        }
        $pathParams['token'] = (string) $params['token'];
        $normalizedBody = $body instanceof ProcessorCallbackPayload ? $body : ProcessorCallbackPayload::fromArray($body);
        $result = $this->inner->invoke(self::operationCallbackSpec(), $pathParams, $normalizedBody->toArray());
        return $result->body;
    }

    public function publishAsset(array $params, LifecycleRequest|array $body): LifecycleResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $normalizedBody = $body instanceof LifecycleRequest ? $body : LifecycleRequest::fromArray($body);
        $result = $this->inner->invoke(self::publishAssetSpec(), $pathParams, $normalizedBody->toArray());
        return LifecycleResponse::fromArray((array) $result->body);
    }

    public function putCollectionMemberships(array $params, CollectionMembershipChangeRequest|array $body): CollectionMembershipListResponse
    {
        $pathParams = [];
        if (!array_key_exists('collection_id', $params)) {
            throw new InvalidPathError('collection_id');
        }
        $pathParams['collection_id'] = (string) $params['collection_id'];
        $normalizedBody = $body instanceof CollectionMembershipChangeRequest ? $body : CollectionMembershipChangeRequest::fromArray($body);
        $result = $this->inner->invoke(self::putCollectionMembershipsSpec(), $pathParams, $normalizedBody->toArray());
        return CollectionMembershipListResponse::fromArray((array) $result->body);
    }

    public function recordIndexSnapshot(IndexSnapshotRequest|array $body): IndexSnapshotResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof IndexSnapshotRequest ? $body : IndexSnapshotRequest::fromArray($body);
        $result = $this->inner->invoke(self::recordIndexSnapshotSpec(), $pathParams, $normalizedBody->toArray());
        return IndexSnapshotResponse::fromArray((array) $result->body);
    }

    public function removeCollectionMembership(array $params): mixed
    {
        $pathParams = [];
        if (!array_key_exists('collection_id', $params)) {
            throw new InvalidPathError('collection_id');
        }
        $pathParams['collection_id'] = (string) $params['collection_id'];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $result = $this->inner->invoke(self::removeCollectionMembershipSpec(), $pathParams, null);
        return $result->body;
    }

    public function rerunPipelines(PipelineRerunRequest|array $body): PipelineRerunResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof PipelineRerunRequest ? $body : PipelineRerunRequest::fromArray($body);
        $result = $this->inner->invoke(self::rerunPipelinesSpec(), $pathParams, $normalizedBody->toArray());
        return PipelineRerunResponse::fromArray((array) $result->body);
    }

    public function restoreAsset(array $params, LifecycleRequest|array $body): LifecycleResponse
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $normalizedBody = $body instanceof LifecycleRequest ? $body : LifecycleRequest::fromArray($body);
        $result = $this->inner->invoke(self::restoreAssetSpec(), $pathParams, $normalizedBody->toArray());
        return LifecycleResponse::fromArray((array) $result->body);
    }

    public function retryOperation(array $params): OperationResponse
    {
        $pathParams = [];
        if (!array_key_exists('operation_id', $params)) {
            throw new InvalidPathError('operation_id');
        }
        $pathParams['operation_id'] = (string) $params['operation_id'];
        $result = $this->inner->invoke(self::retryOperationSpec(), $pathParams, null);
        return OperationResponse::fromArray((array) $result->body);
    }

    public function searchAssets(AssetSearchRequest|array $body): AssetSearchResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof AssetSearchRequest ? $body : AssetSearchRequest::fromArray($body);
        $result = $this->inner->invoke(self::searchAssetsSpec(), $pathParams, $normalizedBody->toArray());
        return AssetSearchResponse::fromArray((array) $result->body);
    }

    public function searchAssetsWithBody(AssetSearchRequest|array $body): AssetSearchResponse
    {
        $pathParams = [];
        $normalizedBody = $body instanceof AssetSearchRequest ? $body : AssetSearchRequest::fromArray($body);
        $result = $this->inner->invoke(self::searchAssetsWithBodySpec(), $pathParams, $normalizedBody->toArray());
        return AssetSearchResponse::fromArray((array) $result->body);
    }

    public function updateAssetCustomMetadata(array $params, CustomMetadataRequest|array $body): mixed
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        $normalizedBody = $body instanceof CustomMetadataRequest ? $body : CustomMetadataRequest::fromArray($body);
        $result = $this->inner->invoke(self::updateAssetCustomMetadataSpec(), $pathParams, $normalizedBody->toArray());
        return $result->body;
    }

    public function updateAssetVersionCustomMetadata(array $params, CustomMetadataRequest|array $body): mixed
    {
        $pathParams = [];
        if (!array_key_exists('asset_id', $params)) {
            throw new InvalidPathError('asset_id');
        }
        $pathParams['asset_id'] = (string) $params['asset_id'];
        if (!array_key_exists('version_id', $params)) {
            throw new InvalidPathError('version_id');
        }
        $pathParams['version_id'] = (string) $params['version_id'];
        $normalizedBody = $body instanceof CustomMetadataRequest ? $body : CustomMetadataRequest::fromArray($body);
        $result = $this->inner->invoke(self::updateAssetVersionCustomMetadataSpec(), $pathParams, $normalizedBody->toArray());
        return $result->body;
    }

    public function updateCollection(array $params, UpdateCollectionRequest|array $body): CollectionResponse
    {
        $pathParams = [];
        if (!array_key_exists('collection_id', $params)) {
            throw new InvalidPathError('collection_id');
        }
        $pathParams['collection_id'] = (string) $params['collection_id'];
        $normalizedBody = $body instanceof UpdateCollectionRequest ? $body : UpdateCollectionRequest::fromArray($body);
        $result = $this->inner->invoke(self::updateCollectionSpec(), $pathParams, $normalizedBody->toArray());
        return CollectionResponse::fromArray((array) $result->body);
    }

    public function updatePipeline(array $params, UpdatePipelineRequest|array $body): PipelineRecordResponse
    {
        $pathParams = [];
        if (!array_key_exists('pipeline_id', $params)) {
            throw new InvalidPathError('pipeline_id');
        }
        $pathParams['pipeline_id'] = (string) $params['pipeline_id'];
        $normalizedBody = $body instanceof UpdatePipelineRequest ? $body : UpdatePipelineRequest::fromArray($body);
        $result = $this->inner->invoke(self::updatePipelineSpec(), $pathParams, $normalizedBody->toArray());
        return PipelineRecordResponse::fromArray((array) $result->body);
    }

    public function updateSmartAlbum(array $params, UpdateSmartAlbumRequest|array $body): SmartAlbumResponse
    {
        $pathParams = [];
        if (!array_key_exists('album_id', $params)) {
            throw new InvalidPathError('album_id');
        }
        $pathParams['album_id'] = (string) $params['album_id'];
        $normalizedBody = $body instanceof UpdateSmartAlbumRequest ? $body : UpdateSmartAlbumRequest::fromArray($body);
        $result = $this->inner->invoke(self::updateSmartAlbumSpec(), $pathParams, $normalizedBody->toArray());
        return SmartAlbumResponse::fromArray((array) $result->body);
    }

    private static function archiveAssetSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ArchiveAsset',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/archive',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function beginAssetIngestionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'BeginAssetIngestion',
            SdkHttpMethod::POST,
            '/assets/ingest',
            202,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function completeAssetIngestionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CompleteAssetIngestion',
            SdkHttpMethod::POST,
            '/assets/ingest/complete',
            202,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createAssetDownloadSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateAssetDownload',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/download',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createAssetPrefixSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateAssetPrefix',
            SdkHttpMethod::POST,
            '/assets/prefixes',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createAssetRenditionDownloadSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateAssetRenditionDownload',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/renditions/{rendition_id}/download',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createBucketSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateBucket',
            SdkHttpMethod::POST,
            '/buckets',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createCollectionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateCollection',
            SdkHttpMethod::POST,
            '/collections',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createPipelineSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreatePipeline',
            SdkHttpMethod::POST,
            '/pipelines',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function createSmartAlbumSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'CreateSmartAlbum',
            SdkHttpMethod::POST,
            '/albums',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deleteAssetSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeleteAsset',
            SdkHttpMethod::DELETE,
            '/assets/{asset_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deleteAssetPrefixSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeleteAssetPrefix',
            SdkHttpMethod::DELETE,
            '/assets/prefixes/{prefix_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deleteBucketSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeleteBucket',
            SdkHttpMethod::DELETE,
            '/buckets/{bucket_name}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deleteCollectionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeleteCollection',
            SdkHttpMethod::DELETE,
            '/collections/{collection_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deletePipelineSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeletePipeline',
            SdkHttpMethod::DELETE,
            '/pipelines/{pipeline_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function deleteSmartAlbumSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'DeleteSmartAlbum',
            SdkHttpMethod::DELETE,
            '/albums/{album_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function getAssetSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'GetAsset',
            SdkHttpMethod::GET,
            '/assets/{asset_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function getAssetRenditionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'GetAssetRendition',
            SdkHttpMethod::GET,
            '/assets/{asset_id}/renditions/{rendition_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function getAssetVersionMetadataSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'GetAssetVersionMetadata',
            SdkHttpMethod::GET,
            '/assets/{asset_id}/versions/{version_id}/metadata',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function getOperationSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'GetOperation',
            SdkHttpMethod::GET,
            '/operations/{operation_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listAssetPrefixesSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListAssetPrefixes',
            SdkHttpMethod::GET,
            '/assets/prefixes',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listAssetRenditionsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListAssetRenditions',
            SdkHttpMethod::GET,
            '/assets/{asset_id}/renditions',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listBucketsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListBuckets',
            SdkHttpMethod::GET,
            '/buckets',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listCollectionMembershipsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListCollectionMemberships',
            SdkHttpMethod::GET,
            '/collections/{collection_id}/memberships',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listCollectionsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListCollections',
            SdkHttpMethod::GET,
            '/collections',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listPipelinesSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListPipelines',
            SdkHttpMethod::GET,
            '/pipelines',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function listSmartAlbumsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'ListSmartAlbums',
            SdkHttpMethod::GET,
            '/albums',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function operationCallbackSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'OperationCallback',
            SdkHttpMethod::POST,
            '/operations/callbacks/{token}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function publishAssetSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'PublishAsset',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/publish',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function putCollectionMembershipsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'PutCollectionMemberships',
            SdkHttpMethod::POST,
            '/collections/{collection_id}/memberships',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function recordIndexSnapshotSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'RecordIndexSnapshot',
            SdkHttpMethod::POST,
            '/index/snapshots',
            201,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function removeCollectionMembershipSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'RemoveCollectionMembership',
            SdkHttpMethod::DELETE,
            '/collections/{collection_id}/memberships/{asset_id}',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function rerunPipelinesSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'RerunPipelines',
            SdkHttpMethod::POST,
            '/pipelines/rerun',
            202,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function restoreAssetSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'RestoreAsset',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/restore',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function retryOperationSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'RetryOperation',
            SdkHttpMethod::POST,
            '/operations/{operation_id}/retry',
            202,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function searchAssetsSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'SearchAssets',
            SdkHttpMethod::GET,
            '/assets/search',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function searchAssetsWithBodySpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'SearchAssetsWithBody',
            SdkHttpMethod::POST,
            '/assets/search',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function updateAssetCustomMetadataSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'UpdateAssetCustomMetadata',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/metadata/custom',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function updateAssetVersionCustomMetadataSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'UpdateAssetVersionCustomMetadata',
            SdkHttpMethod::POST,
            '/assets/{asset_id}/versions/{version_id}/metadata/custom',
            204,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function updateCollectionSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'UpdateCollection',
            SdkHttpMethod::POST,
            '/collections/{collection_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function updatePipelineSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'UpdatePipeline',
            SdkHttpMethod::POST,
            '/pipelines/{pipeline_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

    private static function updateSmartAlbumSpec(): OperationSpec
    {
        static $spec = null;
        if ($spec instanceof OperationSpec) {
            return $spec;
        }
        $spec = new OperationSpec(
            'UpdateSmartAlbum',
            SdkHttpMethod::POST,
            '/albums/{album_id}',
            200,
            [],
            false,
            null,
            false
        );
        return $spec;
    }

}
