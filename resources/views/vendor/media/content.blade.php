<div class="rv-media-container">
    <div class="rv-media-wrapper">
        <input type="checkbox" id="media_aside_collapse" class="fake-click-event hidden">
        <input type="checkbox" id="media_details_collapse" class="fake-click-event hidden">
        <aside class="rv-media-aside @if (config('media.sidebar_display') != 'vertical') rv-media-aside-hide-desktop @endif">
            <label for="media_aside_collapse" class="collapse-sidebar">
                <i class="fa fa-sign-out"></i>
            </label>
            <div class="rv-media-block rv-media-filters">
                <div class="rv-media-block-title">
                    {{ trans('media::media.filter') }}
                </div>
                <div class="rv-media-block-content">
                    <ul class="rv-media-aside-list">
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="everything">
                                <i class="fa fa-recycle"></i> {{ trans('media::media.everything') }}
                            </a>
                        </li>
                        @if (array_key_exists('image', config('media.mime_types', [])))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="image">
                                    <i class="fa fa-file-image"></i> {{ trans('media::media.image') }}
                                </a>
                            </li>
                        @endif
                        @if (array_key_exists('video', config('media.mime_types', [])))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="video">
                                    <i class="fa fa-file-video"></i> {{ trans('media::media.video') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="document">
                                <i class="fa fa-file"></i> {{ trans('media::media.document') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rv-media-block rv-media-view-in">
                <div class="rv-media-block-title">
                    {{ trans('media::media.view_in') }}
                </div>
                <div class="rv-media-block-content">
                    <ul class="rv-media-aside-list">
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="all_media">
                                <i class="fa fa-globe"></i> {{ trans('media::media.all_media') }}
                            </a>
                        </li>
                        @if (RvMedia::hasAnyPermission(['folders.destroy', 'files.destroy']))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="trash">
                                    <i class="fa fa-trash"></i> {{ trans('media::media.trash') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="recent">
                                <i class="fa fa-clock"></i> {{ trans('media::media.recent') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="favorites">
                                <i class="fa fa-star"></i> {{ trans('media::media.favorites') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rv-media-aside-bottom">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0;"></div>
                </div>
                <div class="used-analytics"><span>...</span></div>
            </div>
        </aside>
        <div class="rv-media-main-wrapper">
            <header class="rv-media-header">
                <div class="rv-media-top-header">
                    <div class="rv-media-actions">
                        <label for="media_aside_collapse" class="btn btn-danger collapse-sidebar">
                            <i class="fa fa-bars"></i>
                        </label>
                        @if (RvMedia::hasPermission('files.create'))
                            <button class="btn btn-success js-dropzone-upload">
                                <i class="fas fa-cloud-upload-alt"></i> {{ trans('media::media.upload') }}
                            </button>
{{--                            <button type="button" class="btn btn-success" data-toggle="modal"--}}
{{--                                    data-target="#cut-image-modal">--}}
{{--                                <i class="fas fa-cloud-upload-alt"></i> {{ trans('media::media.upload') }}--}}
{{--                            </button>--}}
{{--                            <div class="modal fade" id="cut-image-modal" tabindex="-1" role="dialog"--}}
{{--                                 aria-labelledby="avatar-modal-label"--}}
{{--                                 aria-hidden="true">--}}
{{--                                <div class="modal-dialog" style="width: 65%; max-width: none;">--}}

{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">Tải ảnh lên</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="container">--}}
{{--                                            <br>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-9">--}}
{{--                                                    <!-- <h3>Demo:</h3> -->--}}
{{--                                                    <div class="docs-demo">--}}
{{--                                                        <div class="img-container">--}}
{{--                                                            <img src="images/picture.jpg" alt="Picture">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <!-- <h3>Preview:</h3> -->--}}

{{--                                                    <div class="">--}}
{{--                                                        <div hidden class="img-preview preview-lg"></div>--}}
{{--                                                        <div hidden class="img-preview preview-md"></div>--}}
{{--                                                        <div hidden class="img-preview preview-sm"></div>--}}
{{--                                                        <div hidden class="img-preview preview-xs"></div>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- <h3>Data:</h3> -->--}}
{{--                                                    <div class="docs-data">--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataX">X</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataX" placeholder="x">--}}
{{--                                                            <span class="input-group-append">--}}
{{--              <span class="input-group-text">px</span>--}}
{{--            </span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataY">Y</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataY" placeholder="y">--}}
{{--                                                            <span class="input-group-append">--}}
{{--              <span class="input-group-text">px</span>--}}
{{--            </span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataWidth">Width</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataWidth" placeholder="width">--}}
{{--                                                            <span class="input-group-append">--}}
{{--              <span class="input-group-text">px</span>--}}
{{--            </span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataHeight">Height</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataHeight" placeholder="height">--}}
{{--                                                            <span class="input-group-append">--}}
{{--              <span class="input-group-text">px</span>--}}
{{--            </span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataRotate">Rotate</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataRotate" placeholder="rotate">--}}
{{--                                                            <span class="input-group-append">--}}
{{--              <span class="input-group-text">deg</span>--}}
{{--            </span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataScaleX">ScaleX</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="input-group input-group-sm">--}}
{{--            <span class="input-group-prepend">--}}
{{--              <label class="input-group-text" for="dataScaleY">ScaleY</label>--}}
{{--            </span>--}}
{{--                                                            <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <br>--}}
{{--                                                    <div class="row" id="actions">--}}
{{--                                                        <div class="col-md-12 docs-buttons">--}}
{{--                                                            <!-- <h3>Toolbar:</h3> -->--}}
{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">--}}
{{--              <span class="fa fa-arrows-alt"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">--}}
{{--              <span class="fa fa-crop-alt"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">--}}
{{--              <span class="fa fa-search-plus"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">--}}
{{--              <span class="fa fa-search-minus"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">--}}
{{--              <span class="fa fa-arrow-left"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">--}}
{{--              <span class="fa fa-arrow-right"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">--}}
{{--              <span class="fa fa-arrow-up"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">--}}
{{--              <span class="fa fa-arrow-down"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">--}}
{{--              <span class="fa fa-undo-alt"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">--}}
{{--              <span class="fa fa-redo-alt"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">--}}
{{--              <span class="fa fa-arrows-alt-h"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">--}}
{{--              <span class="fa fa-arrows-alt-v"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="crop" title="Crop">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">--}}
{{--              <span class="fa fa-check"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="clear" title="Clear">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">--}}
{{--              <span class="fa fa-times"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group" hidden>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="disable" title="Disable">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.disable()">--}}
{{--              <span class="fa fa-lock"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="enable" title="Enable">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.enable()">--}}
{{--              <span class="fa fa-unlock"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group">--}}
{{--                                                                <button type="button" class="btn btn-primary" data-method="reset" title="Reset">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="Resert">--}}
{{--              <span class="fa fa-sync-alt"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">--}}
{{--                                                                    <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="Nhấn để chọn ảnh">--}}
{{--              <span class="fa fa-upload"></span>--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <button hidden type="button" class="btn btn-primary" data-method="destroy" title="Destroy">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.destroy()">--}}
{{--              <span class="fa fa-power-off"></span>--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group btn-group-crop" hidden>--}}
{{--                                                                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">--}}
{{--              Get Cropped Canvas--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 160, height: 90 })">--}}
{{--              160&times;90--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">--}}
{{--            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 320, height: 180 })">--}}
{{--              320&times;180--}}
{{--            </span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}

{{--                                                            <!-- Show the cropped image in modal -->--}}
{{--                                                            <div class="modal fade docs-cropped" hidden id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">--}}
{{--                                                                <div class="modal-dialog">--}}
{{--                                                                    <div class="modal-content">--}}
{{--                                                                        <div class="modal-header">--}}
{{--                                                                            <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>--}}
{{--                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                                <span aria-hidden="true">&times;</span>--}}
{{--                                                                            </button>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="modal-body"></div>--}}
{{--                                                                        <div class="modal-footer">--}}
{{--                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                                            <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div><!-- /.modal -->--}}

{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="getData" data-option data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getData()">--}}
{{--            Get Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="setData" data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setData(data)">--}}
{{--            Set Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="getContainerData" data-option data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getContainerData()">--}}
{{--            Get Container Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="getImageData" data-option data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getImageData()">--}}
{{--            Get Image Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="getCanvasData" data-option data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCanvasData()">--}}
{{--            Get Canvas Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="setCanvasData" data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCanvasData(data)">--}}
{{--            Set Canvas Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="getCropBoxData" data-option data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCropBoxData()">--}}
{{--            Get Crop Box Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="setCropBoxData" data-target="#putData">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCropBoxData(data)">--}}
{{--            Set Crop Box Data--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="moveTo" data-option="0">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">--}}
{{--            Move to [0,0]--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="zoomTo" data-option="1">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">--}}
{{--            Zoom to 100%--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="rotateTo" data-option="180">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">--}}
{{--            Rotate 180°--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <button hidden type="button" class="btn btn-secondary" data-method="scale" data-option="-2" data-second-option="-1">--}}
{{--          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scale(-2, -1)">--}}
{{--            Scale (-2, -1)--}}
{{--          </span>--}}
{{--                                                            </button>--}}
{{--                                                            <textarea hidden class="form-control" id="putData" placeholder="Get data to here or set data with this value"></textarea>--}}

{{--                                                        </div><!-- /.docs-buttons -->--}}

{{--                                                        <div class="col-md-12 docs-toggles">--}}
{{--                                                            <!-- <h3>Toggles:</h3> -->--}}
{{--                                                            <br>--}}
{{--                                                            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">--}}
{{--                                                                <label class="btn btn-primary active">--}}
{{--                                                                    <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">--}}
{{--              16:9--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary">--}}
{{--                                                                    <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">--}}
{{--              4:3--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary">--}}
{{--                                                                    <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">--}}
{{--              1:1--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary">--}}
{{--                                                                    <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">--}}
{{--              2:3--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary">--}}
{{--                                                                    <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">--}}
{{--              Free--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons" hidden>--}}
{{--                                                                <label class="btn btn-primary active" hidden>--}}
{{--                                                                    <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0">--}}
{{--              VM0--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary" hidden>--}}
{{--                                                                    <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1">--}}
{{--              VM1--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary" hidden>--}}
{{--                                                                    <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2">--}}
{{--              VM2--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                                <label class="btn btn-primary" hidden>--}}
{{--                                                                    <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">--}}
{{--                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3">--}}
{{--              VM3--}}
{{--            </span>--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="dropdown dropup docs-options">--}}
{{--                                                                <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">--}}
{{--                                                                    Toggle Options--}}
{{--                                                                    <span class="caret"></span>--}}
{{--                                                                </button>--}}
{{--                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="toggleOptions">--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="responsive" type="checkbox" name="responsive" checked>--}}
{{--                                                                            <label class="form-check-label" for="responsive">responsive</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="restore" type="checkbox" name="restore" checked>--}}
{{--                                                                            <label class="form-check-label" for="restore">restore</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="checkCrossOrigin" type="checkbox" name="checkCrossOrigin" checked>--}}
{{--                                                                            <label class="form-check-label" for="checkCrossOrigin">checkCrossOrigin</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="checkOrientation" type="checkbox" name="checkOrientation" checked>--}}
{{--                                                                            <label class="form-check-label" for="checkOrientation">checkOrientation</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="modal" type="checkbox" name="modal" checked>--}}
{{--                                                                            <label class="form-check-label" for="modal">modal</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="guides" type="checkbox" name="guides" checked>--}}
{{--                                                                            <label class="form-check-label" for="guides">guides</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="center" type="checkbox" name="center" checked>--}}
{{--                                                                            <label class="form-check-label" for="center">center</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="highlight" type="checkbox" name="highlight" checked>--}}
{{--                                                                            <label class="form-check-label" for="highlight">highlight</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="background" type="checkbox" name="background" checked>--}}
{{--                                                                            <label class="form-check-label" for="background">background</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="autoCrop" type="checkbox" name="autoCrop" checked>--}}
{{--                                                                            <label class="form-check-label" for="autoCrop">autoCrop</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="movable" type="checkbox" name="movable" checked>--}}
{{--                                                                            <label class="form-check-label" for="movable">movable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="rotatable" type="checkbox" name="rotatable" checked>--}}
{{--                                                                            <label class="form-check-label" for="rotatable">rotatable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="scalable" type="checkbox" name="scalable" checked>--}}
{{--                                                                            <label class="form-check-label" for="scalable">scalable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="zoomable" type="checkbox" name="zoomable" checked>--}}
{{--                                                                            <label class="form-check-label" for="zoomable">zoomable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="zoomOnTouch" type="checkbox" name="zoomOnTouch" checked>--}}
{{--                                                                            <label class="form-check-label" for="zoomOnTouch">zoomOnTouch</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="zoomOnWheel" type="checkbox" name="zoomOnWheel" checked>--}}
{{--                                                                            <label class="form-check-label" for="zoomOnWheel">zoomOnWheel</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="cropBoxMovable" type="checkbox" name="cropBoxMovable" checked>--}}
{{--                                                                            <label class="form-check-label" for="cropBoxMovable">cropBoxMovable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="cropBoxResizable" type="checkbox" name="cropBoxResizable" checked>--}}
{{--                                                                            <label class="form-check-label" for="cropBoxResizable">cropBoxResizable</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class="dropdown-item">--}}
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" id="toggleDragModeOnDblclick" type="checkbox" name="toggleDragModeOnDblclick" checked>--}}
{{--                                                                            <label class="form-check-label" for="toggleDragModeOnDblclick">toggleDragModeOnDblclick</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div><!-- /.dropdown -->--}}

{{--                                                            <a class="btn btn-success btn-block js-dropzone-upload " data-toggle="tooltip" title="">Lưu</a>--}}

{{--                                                        </div><!-- /.docs-toggles -->--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"--}}
{{--                                    crossorigin="anonymous"></script>--}}
{{--                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"--}}
{{--                                    crossorigin="anonymous"></script>--}}
{{--                            <script src="http://hust.htc-it.team/vendor/core/js/cropper.js"--}}
{{--                                    type="text/javascript"></script>--}}
{{--                            <script src="http://hust.htc-it.team/vendor/core/js/main.js"--}}
{{--                                    type="text/javascript"></script>--}}

                        @endif
                        @if (config('media.allow_external_services') && RvMedia::hasPermission('files.create'))
                            <div class="btn-group" role="group">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-plus"></i> {{ trans('media::media.add_from') }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modal_add_from_youtube">
                                                <i class="fab fa-youtube"></i> {{ trans('media::media.youtube') }}
                                            </a>
                                        </li>
                                        @if (app()->environment('demo'))
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_coming_soon">
                                                    <i class="fab fa-vimeo"></i> {{ trans('media::media.vimeo') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_coming_soon">
                                                    <i class="fab fa-vine"></i> {{ trans('media::media.vine') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if (RvMedia::hasPermission('folders.create'))
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal_add_folder">
                                <i class="fa fa-folder"></i> {{ trans('media::media.create_folder') }}
                            </button>
                        @endif
                        <button class="btn btn-success js-change-action" data-type="refresh">
                            <i class="fas fa-sync"></i> {{ trans('media::media.refresh') }}
                        </button>

                        @if (config('media.sidebar_display') != 'vertical')
                            <div class="btn-group" role="group">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle js-rv-media-change-filter-group" type="button" data-toggle="dropdown">
                                        <i class="fa fa-filter"></i> {{ trans('media::media.filter') }} <span class="js-rv-media-filter-current"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="everything">
                                                <i class="fa fa-recycle"></i> {{ trans('media::media.everything') }}
                                            </a>
                                        </li>
                                        @if (array_key_exists('image', config('media.mime_types', [])))
                                            <li>
                                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="image">
                                                    <i class="fa fa-file-image"></i> {{ trans('media::media.image') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if (array_key_exists('video', config('media.mime_types', [])))
                                            <li>
                                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="video">
                                                    <i class="fa fa-file-video"></i> {{ trans('media::media.video') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="document">
                                                <i class="fa fa-file"></i> {{ trans('media::media.document') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="btn-group" role="group">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle js-rv-media-change-filter-group" type="button" data-toggle="dropdown">
                                        <i class="fa fa-eye"></i> {{ trans('media::media.view_in') }} <span class="js-rv-media-filter-current"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="all_media">
                                                <i class="fa fa-globe"></i> {{ trans('media::media.all_media') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="trash">
                                                <i class="fa fa-trash"></i> {{ trans('media::media.trash') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="recent">
                                                <i class="fa fa-clock"></i> {{ trans('media::media.recent') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="favorites">
                                                <i class="fa fa-star"></i> {{ trans('media::media.favorites') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if (RvMedia::hasAnyPermission(['folders.destroy', 'files.destroy']))
                            <button class="btn btn-danger js-files-action hidden" data-action="empty_trash">
                                <i class="fa fa-trash"></i> {{ trans('media::media.empty_trash') }}
                            </button>
                        @endif

                    </div>
                    <div class="rv-media-search">
                        <form class="input-search-wrapper" action="" method="GET">
                            <input type="text" class="form-control" placeholder="{{ trans('media::media.search_file_and_folder') }}">
                            <button class="btn btn-link" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="rv-media-bottom-header">
                    <div class="rv-media-breadcrumb">
                        <ul class="breadcrumb"></ul>
                    </div>
                    <div class="rv-media-tools">
                        <div class="btn-group" role="group">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle"
                                        type="button"
                                        data-toggle="dropdown">
                                    {{ trans('media::media.sort') }} <i class="fa fa-sort-alpha-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="name-asc">
                                            <i class="fas fa-sort-alpha-up"></i> {{ trans('media::media.file_name_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="name-desc">
                                            <i class="fas fa-sort-alpha-down"></i> {{ trans('media::media.file_name_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="created_at-asc">
                                            <i class="fas fa-sort-numeric-up"></i> {{ trans('media::media.created_date_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="created_at-desc">
                                            <i class="fas fa-sort-numeric-down"></i> {{ trans('media::media.created_date_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="updated_at-asc">
                                            <i class="fas fa-sort-numeric-up"></i> {{ trans('media::media.uploaded_date_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="updated_at-desc">
                                            <i class="fas fa-sort-numeric-down"></i> {{ trans('media::media.uploaded_date_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="size-asc">
                                            <i class="fas fa-sort-numeric-up"></i> {{ trans('media::media.size_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="size-desc">
                                            <i class="fas fa-sort-numeric-down"></i> {{ trans('media::media.size_desc') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown rv-dropdown-actions disabled">
                                <button class="btn btn-secondary dropdown-toggle"
                                        type="button" data-toggle="dropdown">
                                    {{ trans('media::media.actions') }} &nbsp;<i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu"></ul>
                            </div>
                        </div>
                        <div class="btn-group js-rv-media-change-view-type" role="group">
                            <button class="btn btn-secondary" type="button" data-type="tiles">
                                <i class="fa fa-th-large"></i>
                            </button>
                            <button class="btn btn-secondary" type="button" data-type="list">
                                <i class="fa fa-th-list"></i>
                            </button>
                        </div>
                        <label for="media_details_collapse" class="btn btn-link collapse-panel">
                            <i class="fa fa-sign-out"></i>
                        </label>
                    </div>
                </div>
            </header>

            <main class="rv-media-main">
                <div class="rv-media-items"></div>
                <div class="rv-media-details hidden">
                    <div class="rv-media-thumbnail">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="rv-media-description">
                        <div class="rv-media-name">
                            <p>{{ trans('media::media.nothing_is_selected') }}</p>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="rv-media-footer hidden">
                <button type="button" class="btn btn-danger btn-lg js-insert-to-editor">{{ trans('media::media.insert') }}</button>
            </footer>
        </div>
        <div class="rv-upload-progress hide-the-pane">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('media::media.upload_progress') }}</h3>
                    <a href="javascript:void(0);" class="close-pane">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <ul class="rv-upload-progress-table"></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="rv-modals">
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_coming_soon">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fab fa-windows"></i> {{ trans('media::media.coming_soon') }}
                        </h4>
                        <button type="button" class="close" data-dismiss-modal="#modal_coming_soon" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>These features are on development</p>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_add_from_youtube">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fab fa-windows"></i> {{ trans('media::media.add_from_youtube') }}
                        </h4>
                        <button type="button" class="close" data-dismiss-modal="#modal_add_from_youtube" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-prepend custom-checkbox">
                                    <input type="checkbox">
                                    <span class="float-left"></span>
                                    <small>{{ trans('media::media.playlist') }}</small>
                                </label>
                                <input type="text" class="form-control rv-youtube-url" placeholder="https://">
                                <div class="input-group-prepend">
                                    <button class="btn btn-success rv-btn-add-youtube-url" type="button">{{ trans('media::media.add_url') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_add_folder">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fab fa-windows"></i> {{ trans('media::media.create_folder') }}
                        </h4>
                        <button type="button" class="close" data-dismiss-modal="#modal_add_folder" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="rv-form form-add-folder">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ trans('media::media.folder_name') }}">
                                <div class="input-group-prepend">
                                    <button class="btn btn-success rv-btn-add-folder" type="submit">{{ trans('media::media.create') }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_rename_items">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="rv-form form-rename">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fab fa-windows"></i> {{ trans('media::media.rename') }}
                            </h4>
                            <button type="button" class="close" data-dismiss-modal="#modal_rename_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="rename-items"></div>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss-modal="#modal_rename_items">{{ trans('media::media.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('media::media.save_changes') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_trash_items">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-delete-items">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fab fa-windows"></i> {{ trans('media::media.move_to_trash') }}
                            </h4>
                            <button type="button" class="close" data-dismiss-modal="#modal_trash_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.confirm_trash') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_trash_items">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_delete_items">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-delete-items">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fab fa-windows"></i> {{ trans('media::media.confirm_delete') }}
                            </h4>
                            <button type="button" class="close" data-dismiss-modal="#modal_delete_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.confirm_delete_description') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_delete_items">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_empty_trash">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-empty-trash">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fab fa-windows"></i> {{ trans('media::media.empty_trash_title') }}
                            </h4>
                            <button type="button" class="close" data-dismiss-modal="#modal_empty_trash" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.empty_trash_description') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_empty_trash">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button class="hidden js-rv-clipboard-temp"></button>
</div>
<script type="text/x-custom-template" id="rv_media_loading">
    <div class="loading-wrapper">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                            stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
    </div>
</script>

<script type="text/x-custom-template" id="rv_action_item">
    <li>
        <a href="javascript:;" class="js-files-action" data-action="__action__">
            <i class="__icon__"></i> __name__
        </a>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_items_list">
    <div class="rv-media-list">
        <ul>
            <li class="no-items">
                <i class="fas fa-cloud-upload-alt"></i>
                <h3>Drop files and folders here</h3>
                <p>Or use the upload button above.</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level" title="{{ trans('media::media.up_level') }}">
                <div class="custom-checkbox"></div>
                <div class="rv-media-file-name">
                    <i class="fas fa-level-up-alt"></i>
                    <span>...</span>
                </div>
                <div class="rv-media-file-size"></div>
                <div class="rv-media-created-at"></div>
            </li>
        </ul>
    </div>
</script>

<script type="text/x-custom-template" id="rv_media_items_tiles" class="hidden">
    <div class="rv-media-grid">
        <ul>
            <li class="no-items">
                <i class="__noItemIcon__"></i>
                <h3>__noItemTitle__</h3>
                <p>__noItemMessage__</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level">
                <div class="rv-media-item" data-context="__type__" title="{{ trans('media::media.up_level') }}">
                    <div class="rv-media-thumbnail">
                        <i class="fas fa-level-up-alt"></i>
                    </div>
                    <div class="rv-media-description">
                        <div class="title">...</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</script>

<script type="text/x-custom-template" id="rv_media_items_list_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" title="__name__" data-id="__id__">
        <div class="custom-checkbox">
            <label>
                <input type="checkbox">
                <span></span>
            </label>
        </div>
        <div class="rv-media-file-name">
            __thumb__
            <span>__name__</span>
        </div>
        <div class="rv-media-file-size">__size__</div>
        <div class="rv-media-created-at">__date__</div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_items_tiles_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" data-id="__id__">
        <input type="checkbox" class="hidden">
        <div class="rv-media-item" title="__name__">
            <span class="media-item-selected">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z"></path>
                </svg>
            </span>
            <div class="rv-media-thumbnail">
                __thumb__
            </div>
            <div class="rv-media-description">
                <div class="title title{{Request::get('file_id')}}">__name__</div>
            </div>
        </div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_upload_progress_item">
    <li>
        <div class="rv-table-col">
            <span class="file-name">__fileName__</span>
            <div class="file-error"></div>
        </div>
        <div class="rv-table-col">
            <span class="file-size">__fileSize__</span>
        </div>
        <div class="rv-table-col">
            <span class="label label-__status__">__message__</span>
        </div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_breadcrumb_item">
    <li>
        <a href="#" data-folder="__folderId__" class="js-change-folder">__icon__ __name__</a>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_rename_item">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="__icon__"></i>
                </div>
            </div>
            <input class="form-control" placeholder="__placeholder__" value="__value__">
        </div>
    </div>
</script>
