<?php
/**
 * Connected Communities Initiative
 * Copyright (C) 2016 Queensland University of Technology
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Import</strong> người dùng sử dụng file CSV</div>
    <div class="panel-body">
        <h4>Import người dùng</h4>
        <div class="well">
        <?php $form = ActiveForm::begin(array(
            'id'=>'registration-form',
            'enableAjaxValidation'=>true,
            'options' => array('enctype' => 'multipart/form-data'),
            'action' => Url::to(['/bulk_import/main/upload'])
        )); ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->field($model,'csv_file')->fileInput(); ?>
        <br />
        <?php echo Html::submitButton('Import người dùng', array('class' => '')); ?>
        <?php $form->end(); ?>
        </div>
        <br />
        <hr>
        <br />
        <h4>FAQ</h4>
        
        <h5>Những thông tin gì của người dùng có thể được import</h5>
        <p>Công cụ này cho phép import thông tin về tài khoản người dùng, họ tên và các nhóm mà người dùng tham gia</p>
        <br />
        <p>Các thông tin cần có trong file CSV:</p>
        <ul>
            <li><strong>username</strong>: Tài khoản đăng nhập của người dùng.</li>
            <li><strong>email</strong>: Email</li>
            <li><strong>password</strong>: Mật khẩu đăng nhập</li>
            <li><strong>firstname</strong>: Tên người dùng</li>
            <li><strong>lastname</strong>: Họ và tên đệm</li>
            <li><strong>space_names</strong>: Các nhóm mà người dùng sẽ tham gia vào <i>(phân cách bởi dấu <strong>","</strong>)</i></li>
        </ul>
        <br />

        <h5>Mẫu file CSV</h5>
        <p>Hãy chắc chắn rằng file của bạn có cấu trúc đúng với mẫu</p>
        <table class="table">
            <tr>
                <td><b>username</b></td>
                <td><b>email</b></td>
                <td><b>password</b></td>
                <td><b>firstname</b></td>
                <td><b>lastname</b></td>
                <td><b>space_names</b></td>
            </tr>
            <tr>
                <td>user1</td>
                <td>user1@example.com</td>
                <td>test123</td>
                <td>thứ nhất</td>
                <td>Người dùng</td>
                <td>Nhóm 1</td>
            </tr>
            <tr>
                <td>user2</td>
                <td>user2@example.com</td>
                <td>test123</td>
                <td>thứ hai</td>
                <td>Người dùng</td>
                <td>Nhóm 1,Nhóm 2</td>
            </tr>
        </table>
    </div>
</div>

