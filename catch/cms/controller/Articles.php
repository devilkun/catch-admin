<?php
// +----------------------------------------------------------------------
// | Catch-CMS Design On 2020
// +----------------------------------------------------------------------
// | CatchAdmin [Just Like ～ ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2020 http://catchadmin.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( https://github.com/yanwenwu/catch-admin/blob/master/LICENSE.txt )
// +----------------------------------------------------------------------
// | Author: JaguarJack [ njphper@gmail.com ]
// +----------------------------------------------------------------------

namespace catchAdmin\cms\controller;

use catcher\base\CatchRequest as Request;
use catcher\CatchResponse;
use catcher\base\CatchController;
use catchAdmin\cms\model\Articles as articlesModel;

class Articles extends CatchController
{
    protected $articlesModel;
    
    public function __construct(ArticlesModel $articlesModel)
    {
        $this->articlesModel = $articlesModel;
    }
    
    /**
     * 列表
     * @time 2020年12月27日 19:40
     * @param Request $request 
     */
    public function index(Request $request) : \think\Response
    {
        return CatchResponse::paginate($this->articlesModel->getList());
    }
    
    /**
     * 保存信息
     * @time 2020年12月27日 19:40
     * @param Request $request 
     */
    public function save(Request $request) : \think\Response
    {
        return CatchResponse::success($this->articlesModel->storeBy($request->post()));
    }
    
    /**
     * 读取
     * @time 2020年12月27日 19:40
     * @param $id 
     */
    public function read($id) : \think\Response
    {
        return CatchResponse::success($this->articlesModel->findBy($id));
    }
    
    /**
     * 更新
     * @time 2020年12月27日 19:40
     * @param Request $request 
     * @param $id
     */
    public function update(Request $request, $id) : \think\Response
    {
        return CatchResponse::success($this->articlesModel->updateBy($id, $request->post()));
    }
    
    /**
     * 删除
     * @time 2020年12月27日 19:40
     * @param $id
     */
    public function delete($id) : \think\Response
    {
        return CatchResponse::success($this->articlesModel->deleteBy($id));
    }
}