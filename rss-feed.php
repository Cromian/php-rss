<?php
	$rss = new DOMDocument();
	$rss->load('https://www.example.com');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 10;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		echo '	
			<div class="feed-row">
				<a href="'.$link.'" target="blank">'. $title .'</a>
				<p>'. $description .'</p>
				<div>'. $date .'</div>
			</div>
			';
	}				
?>
