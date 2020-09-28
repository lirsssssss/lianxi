
<?php
interface cache{
	//缓存密码

	const maxKey = 19000;//换存量
	public function getc($key);
	public function setc($key,$value);
	public function flush();
}


$dir = new DirectoryIterator(dirname(__FILE__));//mulu
foreach($dir as $fileinfo){
	if(!$fileinfo->isDir()){//是否是一个目录
		echo $fileinfo->getFilename(),'<br>',$fileinfo->getSize(),'<hr>';
	}
}

