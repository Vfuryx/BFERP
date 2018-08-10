<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageFileHandler;
use App\Http\Requests\Api\UploadImageRequest;

use Dingo\Api\Http\Response;

/**
 * 图片上传
 * @Resource("uploadimages",uri="/api")
 */
class UploadImagesController extends Controller
{

    /**
     * 图片上传
     *
     * @Post("/uploadimages")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("image", type="file", description="图片", required=true),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *             "image": {
     *                  "图片类型限定为jpeg、png、gif"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "path": "/uploads/images/temp/201808/10/0_1533881172_B1CgixHzoh.jpg",
     *          "meta": {
     *              "status_code": 201
     *          }
     *      })
     * })
     */
    public function store(UploadImageRequest $request, ImageFileHandler $imageFileHandler)
    {
        $imagePath = $imageFileHandler->save($request->validated()['image'],'temp',\Auth::user()?\Auth::user()->id:0);

        $imagePath['meta'] = ['status_code' => 201];

        return new Response($imagePath,201);
    }

}
