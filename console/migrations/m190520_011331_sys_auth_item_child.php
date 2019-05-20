<?php

use yii\db\Migration;

class m190520_011331_sys_auth_item_child extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_auth_item_child}}', [
            'parent' => "varchar(64) NOT NULL",
            'child' => "varchar(64) NOT NULL",
            'PRIMARY KEY (`parent`,`child`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统_角色权限表'");
        
        /* 索引设置 */
        $this->createIndex('child','{{%sys_auth_item_child}}','child',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_sys_auth_item_2364_00','{{%sys_auth_item_child}}', 'parent', '{{%sys_auth_item}}', 'name', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_sys_auth_item_2364_01','{{%sys_auth_item_child}}', 'child', '{{%sys_auth_item}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/main/clear-cache']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/sys/manager-notify/announce']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/sys/manager-notify/announce-view']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/sys/manager-notify/message']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/sys/manager/personal']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'/sys/manager/up-password']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'addons']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'base']);
        $this->insert('{{%sys_auth_item_child}}',['parent'=>'测试','child'=>'base-announce']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_auth_item_child}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

