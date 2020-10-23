<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;

use Hyperf\View\Engine\ThinkEngine;
use Hyperf\DbConnection\Db;
use Hyperf\View\RenderInterface;

use Hyperf\Di\Annotation\Inject;  //因为session 需要用到注解，此处需要添加引入注解类

/**
 * @AutoController
 */
class TestController extends AbstractController
{


    /**
     * 注解引入session对象
     * @Inject()
     * @var \Hyperf\Contract\SessionInterface
     */
    private $session;


    public function test_render(RenderInterface $render)
    {
        $html =  $render->render('test/think',['name'=>'hyperf test']);
        return $html;
    }


    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function test_session(RenderInterface $render)
    {
        $this->session->set('test_session','this is from session');
        $view_data = ['name'=>'hyperf test'];
        $html =  $render->render('test/think',$view_data);
        return $html;
    }


    public function get_session(RenderInterface $render)
    {
        //$this->session->set('test_session','this is from session');
        //$view_data = ['name'=>'hyperf test'];
        //$html =  $render->render('test/think',$view_data);
        //return $html;
        return $this->session->get('test_session');  
    }
   

    public function test()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello test {$user}.",
        ];
    }



    public function select()
    {
        $info = Db::table('article')->select('*')->get();
        return $info;
    }

    public function get_first()
    {
        $first = Db::table('article')->select('*')->first();
        return json_encode($first,256);
    }


    public function think(ThinkEngine $render)
    {
        $html =  $render->render('test/think',['name'=>'hyperf test'],config('view.config'));
        return $html;
    }




}
