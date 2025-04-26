<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Usertype;
use App\Models\FormPermission;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class PermissionController extends BaseController
{
    public function __construct(){

        $this->folder='permission';
        $this->permission = new Permission();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            
            
         }
         else
         {
            // $menu = Menu::where('parentmoduleid',0)->get();
            //  $menu = Menu::all();
            // $menu = Menu::whereIn('url', ['#', 'dashboard'])->orwhere('parentmoduleid',0)->get();
            $menu = Menu::where('parentmoduleid',0)->orwhere('url','#')->orderby('modulename','asc')->get();
            // $menu = Menu::where('url','#')->get();
            
            $usertype = Usertype::all();
            $permission=Permission::all();
            $allowed=[];
            foreach($permission as $li)
            {
                $allowed[$li->modulesid.'_'.$li->usertypeid]=1;
            }
            $title='Menu Permission List';
            $folder=$this->folder;
           return view($this->folder.'.list',compact('title','folder','menu','usertype','allowed'));

         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'module_usertype' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {
            $explodedata=explode('_',$request->module_usertype);
            $permissiondata = ["modulesid"=>$explodedata[0],"usertypeid"=>$explodedata[1]];

            if($request->checked=='Y')
            {
    
                $data_save=Permission::create($permissiondata);
            
                if($data_save)
                {
                    return $this->sendResponse(true,getMessageText('insert'));
    
                }
                else
                {
                return $this->sendError(getMessageText('insert',false));
    
                }
            }
            else
            {
                $isdel = Permission::where($permissiondata)->delete();
                if($isdel)
                {
                    return $this->sendResponse(true,getMessageText('delete'));

                }
                else
                {
                return $this->sendError(getMessageText('delete',false));

                }

            }
           
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    public function SubmenuData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menuid' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {
            $menu = Menu::where('parentmoduleid',$request->menuid)->get();
            $usertype = Usertype::all();
            $permission=Permission::all();
            $allowed=[];
            foreach($permission as $li)
            {
                $allowed[$li->modulesid.'_'.$li->usertypeid]=1;
            }

            $html=view($this->folder.'.table',compact('menu','usertype','allowed'))->render();
            return $this->sendResponse($html,getMessageText('fetch'));

        }

    }

    public function formPermission(Request $request)
    {
        
            $usertype = Usertype::all();
           
            $title='Form Permission List';
            $folder=$this->folder;
           return view($this->folder.'.form',compact('title','folder','usertype'));

         
    }

    public function UsergroupWiseFormMenuData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usergroupid' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {
            $permission = FormPermission::where('usertypeid',$request->usergroupid)->get();
            $formList=FormPermission::distinct()->pluck('formname');
           
            $allowed=[];
             foreach($permission as $li)
             {
                $allowed[$li->formname.'_V']=trim($li->isget);
                $allowed[$li->formname.'_I']=trim($li->isinsert);
                $allowed[$li->formname.'_E']=trim($li->isedit);
                $allowed[$li->formname.'_U']=trim($li->isupdate);
                $allowed[$li->formname.'_D']=trim($li->isdelete);
             }

            $html=view($this->folder.'.formtable',compact('formList','permission','allowed'))->render();
            return $this->sendResponse($html,getMessageText('fetch'));

        }

    }


    public function setformpermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'formname' => 'required|string',
            'usergroup'=>  'required|integer'
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {

            $explodedata=explode('_',$request->formname);
            $formname=$explodedata['0'];
            $operationfor=$explodedata['1'];


            $formDetail=FormPermission::where('formname',$formname)->pluck('slug')->toArray();
            $permissiondata=['formname'=>$formname,'slug'=>$formDetail[0],'usertypeid'=>$request->usergroup];
            if($request->checked=='Y')
            {
                if($operationfor=='V')
                {
                    $permissiondata['isget']='Y';

                }
                else if($operationfor=='I')
                {
                    $permissiondata['isinsert']='Y';

                }
                else if($operationfor=='E')
                {
                    $permissiondata['isedit']='Y';

                }
                else if($operationfor=='U')
                {
                    $permissiondata['isupdate']='Y';

                }
                else if($operationfor=='D')
                {
                    $permissiondata['isdelete']='Y';

                }


            }
            else
            {
                if($operationfor=='V')
                {
                    $permissiondata['isget']='N';

                }

                else if($operationfor=='I')
                {
                    $permissiondata['isinsert']='N';

                }
                else if($operationfor=='E')
                {
                    $permissiondata['isedit']='N';

                }
                else if($operationfor=='U')
                {
                    $permissiondata['isupdate']='N';

                }
                else if($operationfor=='D')
                {
                    $permissiondata['isdelete']='N';

                }
            }

            $checkdata=FormPermission::where('formname',$formname)->where('usertypeid',$request->usergroup)->get();
           

            if(count($checkdata) < 1)
            {
    
                $data_save=FormPermission::create($permissiondata);
            
                if($data_save)
                {
                    return $this->sendResponse(true,getMessageText('insert'));
    
                }
                else
                {
                return $this->sendError(getMessageText('insert',false));
    
                }
            }
            else
            {
                $isupdate = FormPermission::where('formname',$formname)->where('usertypeid',$request->usergroup)->update($permissiondata);
                if($isupdate)
                {
                    return $this->sendResponse(true,getMessageText('update'));

                }
                else
                {
                return $this->sendError(getMessageText('update',false));

                }

            }

        }

    }
}
