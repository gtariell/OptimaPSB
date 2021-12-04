<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Jira\Authentication\BasicAuthenticationService;
use Jira\Client;
use JiraRestApi\Board\BoardService;
use JiraRestApi\Configuration\ArrayConfiguration;
use JiraRestApi\Field\Field;
use JiraRestApi\Field\FieldService;
use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\Transition;
use JiraRestApi\Priority\PriorityService;
use JiraRestApi\Project\ProjectService;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Description of Main
 *
 */
class MainController extends AppController{

    public function indexAction(){
        $model = new Main;

        $lang = App::$app->getProperty('lang')['code'];
        $total = \R::count('posts', 'lang_code = ?', [$lang]);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);
        View::setMeta('Blog :: Главная страница', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('posts', 'pagination', 'total'));
    }
    
    public function testAction(){
        if($this->isAjax()){
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
    }

    public function tasksAction() {}
    public function projectAction() {}
    public function crewAction() {}
    public function companyAction() {}
    public function calendarAction() {}
    public function kanbanAction() {
        $conf = new ArrayConfiguration([
            'jiraHost' => 'https://ant-optima.atlassian.net',
            'jiraUser' => 'gtariell@gmail.com',
            'jiraPassword' => 'X6ZsxufurHC5loBzU8RbC713',
            'cookieAuthEnabled' => false,
            'cookieFile' => CACHE . '/jira-cookie.txt',
        ]);

        try {
            $board_service = new BoardService($conf);
            $board_id = 1;
            $board = $board_service->getBoard($board_id);
            $issues_result = $board_service->getBoardIssues($board_id, [
                'maxResults' => 500,
//                'jql' => urlencode('status != Closed'),
            ])->getArrayCopy();
            $issues = [];
            foreach ($issues_result as $issue) {
                if (isset($_GET['q'])) dump($issue);
                $issues[$issue->fields->status->name][] = [
                    'id' => $issue->id,
                    'key' => $issue->key,
                    'summary' => $issue->fields->summary
                ];
            }
//            dump($issues);
        } catch (\JiraRestApi\JiraException $e) {
            print("Error Occured! " . $e->getMessage());
        }

        $this->set(compact('board','issues','conf'));
    }
    public function profileAction() {}
    public function shopAction() {}
    public function ratingAction() {}
    public function chatAction() {}
    public function jiraAction() {
        $conf = new ArrayConfiguration([
            'jiraHost' => 'https://ant-optima.atlassian.net',
            'jiraUser' => 'gtariell@gmail.com',
            'jiraPassword' => 'X6ZsxufurHC5loBzU8RbC713',
            'cookieAuthEnabled' => false,
            'cookieFile' => CACHE . '/jira-cookie.txt',
        ]);

        $statuses = [
            '',
            'К выполнению',
            'В работе',
            'Готово',
        ];

        $issueKey = $_POST['id'];
        $status = $statuses[$_POST['status']];
//        dd($_POST);
//        $issueKey = "TEST-879";

        try {
            $transition = new Transition($conf);
            $transition->setTransitionName($status); //'Resolved'
            $transition->setCommentBody('performing the transition via REST API.');

            $issueService = new IssueService($conf);
            $issueService->transition($issueKey, $transition);
        } catch (\JiraRestApi\JiraException $e) {
            print("add Comment Failed : " . $e->getMessage());
        }

        die;

       /* try {
            $board_service = new BoardService($conf);
//            $board = $board_service->getBoardList();
//            $board = $board->getArrayCopy();
            $board_id = 1; //$board[0]->id;
            $board = $board_service->getBoard($board_id);
//            dd($board);
            $issues = $board_service->getBoardIssues($board_id, [
                'maxResults' => 500,
                'jql' => urlencode('status != Closed'),
            ])->getArrayCopy();
//            dd($issues[0]);
//            foreach ($issues as $issue) {
//                dump($issue->jsonSerialize());
//            }
//            $ps = new PriorityService($conf);
//            $p = $ps->getAll();
//            dump($p);
        } catch (\JiraRestApi\JiraException $e) {
            print("Error Occured! " . $e->getMessage());
        }*/

//        $this->set(compact('board','issues','conf'));
    }

    public function ParaQGAction() {

    }



}
