<?php


namespace App\Http\Controllers;
use App\link;
use Illuminate\Http\Request;
use Validator;

class LinkController extends Controller
{
    public function make(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('shorter/')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $url= $request->input('url');
            $code = null;
            $exist = link::where('url','=',$url);
            if($exist ->count()===1){
                $code = $exist->first()->code;
                return redirect('shorter/')->with('global',url("/shorter/{$code}"));
            }
            else{
                $created =  link::create(array(
                    'url'=>$url,
                    'code'=>''

                ));
                if($created){
                    $code = base_convert($created->id,10,36);
                    link::where('id','=',$created->id)->update(array(
                        'code'=> $code

                    ));

                }
                if($code){
                    //redirect home
                    return redirect('shorter/')->with('global',url("/shorter/{$code}"));
                }
                return redirect('shorter/')->with('global','Something was wrong');
            }


        }

        //
    }
    public function get($code){
        $link = link::where('code','=',$code);
        if($link->count()===1){
            return Redirect($link->first()->url);
        }
        return Redirect('shorter');
    }
}
