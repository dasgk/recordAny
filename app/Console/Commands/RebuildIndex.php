<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RebuildIndex extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'command:rebuild_index';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$path = __DIR__ . '\\..\\..\\..\\vendor\\hightman\\xunsearch\\util\\Indexer.php';
		//清除缓存
		exec("php ".$path.' -c GBK --clean demo');
		echo 'clean index'.PHP_EOL;
		//重建缓存
		exec("php ".$path.' -c GBK --rebuild --source=mysql://root:root@localhost/recordany --sql="SELECT  users.user_id,users.nick_name,article.title,article.content,article.id FROM `article` join users on users.user_id=article.uid;" --project=demo');
		echo 'rebuild index completed'.PHP_EOL;
	}
}
