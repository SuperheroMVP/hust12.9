<?php

namespace Theme\Hust\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
//use Botble\Captcha\Utilities\Request;
use Illuminate\Http\Request;
use Botble\Theme\Http\Controllers\PublicController;

use Botble\Contact\Models\Contact;

class HustController extends PublicController
{
    /**
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getIndex(BaseHttpResponse $response)
    {
        return parent::getIndex($response);
    }

    /**
     * @param BaseHttpResponse $response
     * @param null $key
     * @return BaseHttpResponse|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getView(BaseHttpResponse $response, $key = null)
    {
        $urli = NULL;
        foreach (request()->segments() as $segment){
            $urli = $urli."/".$segment;
        }

        if ($urli == "/profile/all"){
            $key = $urli;
        }

        if ($urli == "/tuyensinh/all"){
            $key = $urli;
        }

        return parent::getView($response, $key);
    }

    /**
     * @return mixed
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }

    public function feedback(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->title;
        $contact->content = $request->content;
        $contact->save();
        return redirect()->back() ->with('alert', 'Ý kiến của bạn đã được gửi đi!');
    }
}
