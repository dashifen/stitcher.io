<?php

namespace App\Comments;

use Tempest\Database\Migration;
use Tempest\Database\QueryStatement;
use Tempest\Database\QueryStatements\CreateTableStatement;

final readonly class CreateCommentsTable implements Migration
{
    public function getName(): string
    {
        return '002-create-comments-table';
    }

    public function up(): QueryStatement|null
    {
        return (new CreateTableStatement('Comment'))
            ->primary()
            ->belongsTo('Comment.user_id', 'User.id')
            ->varchar('postId')
            ->text('comment')
            ->datetime('createdAt');
    }

    public function down(): QueryStatement|null
    {
        return null;
    }
}