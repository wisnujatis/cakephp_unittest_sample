<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\View\JsonView;

class UsersController extends AppController
{
    public function index() : array
    {
        // $this->request->allowMethod(['delete']);
        return [JsonView::class];
    }
}
