<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateOrderTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('order');
        $table->addColumn('user_id', 'integer')
            ->addColumn('description', 'string', ['limit' => 255])
            ->addColumn('quantity', 'integer')
            ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('user_id', 'user', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->create();
    }
}
