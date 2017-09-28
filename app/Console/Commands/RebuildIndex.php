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
		exec("php ".$path.' -c GBK --clean article');
		echo 'clean article index'.PHP_EOL;
		exec("php ".$path.' -c GBK --clean user');

		echo 'clean user  index'.PHP_EOL;

		//重建索引
		echo exec("php ".$path.' -c GBK --rebuild --source=mysql://root:root@localhost/recordany --sql="SELECT  article.title,article.content,article.id FROM `article`	 " --project=article');

		echo 'rebuild article index completed'.PHP_EOL;

		//重建索引
		echo exec("php ".$path.' -c GBK --rebuild --source=mysql://root:root@localhost/recordany --sql="SELECT  user_id,nick_name FROM `users` " --project=user');
		echo 'rebuild user index completed'.PHP_EOL;
	}
}
