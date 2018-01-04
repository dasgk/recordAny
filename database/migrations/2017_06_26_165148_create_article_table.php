<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArticleTable extends Migration
{
	private $tableName = 'article';
	private $tableComment = '文章表';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tableName, function (Blueprint $table) {
			$table->increments('article_id');
			$table->integer('uid', false, true)->comment('作者id');
			$table->integer('cate_id', false, true)->comment('分类id')->default(0);
			$table->string('title', 100)->comment('文章标题');
			$table->string('sub_title', 200)->comment('文章短标题')->nullable();
			$table->string('content', 255)->comment('文章简介')->nullable();
			$table->string('list_img', 255)->comment('文章头图')->nullable();
			$table->integer('look_num', false, true)->comment('查看数')->default(0);
			$table->integer('comment_num', false, true)->comment('评论数')->default(0);
            $table->integer('collect_num', false, true)->comment('收藏数')->default(0);
			$table->timestamps();
			if (env('DB_CONNECTION') == 'oracle') {
				$table->comment = $this->tableComment;
			}
		});

		if (env('DB_CONNECTION') == 'mysql') {
			DB::statement("ALTER TABLE `" . DB::getTablePrefix() . $this->tableName . "` comment '{$this->tableComment}'");
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->tableName);
		if (env('DB_CONNECTION') == 'oracle') {
			$sequence = DB::getSequence();
			$sequence->drop(strtoupper($this->tableName . '_article_id_SEQ'));
		}
	}
}


