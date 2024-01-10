<?php 
	parse_str($_SERVER['QUERY_STRING'], $queries); 
	if ( isset($queries['replytocom']) ) {
		$commentor = get_comment($queries['replytocom']);
	}
?>
<?php  ?>

<section class="comment-respond">

	<form action="<?php echo bloginfo('url') ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form form" novalidate="">
		<h2 class="comment-reply-title">
			<?php echo isset($queries['replytocom']) ? sprintf('ตอบความเห็นของ %s', $commentor->comment_author) : __('แสดงความเห็นของคุณที่นี่', 'jindatheme') ?>
			<?php if ( isset($queries['replytocom']) ) { ?>
				<small><a href="javascript:void(0)" onclick="removeParam('replytocom', '<?php echo $_SERVER['REQUEST_URI']; ?>')">(คลิกที่นี่ เพื่อยกเลิกการตอบ)</a></small>
			<?php } ?>
		</h2>
		<p><?php _e('กรุณากรอกอีเมล์ของคุณก่อนส่งข้อมูล เพื่อรับการแจ้งเตือนเมื่อมีคนมาตอบข้อความของคุณ', 'jindatheme') ?></p>
        <div class="flex flex-wrap -mx-3 mb-6">
            <?php if (!is_user_logged_in()) : ?>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="author" class="block text-sm font-medium leading-6 text-gray-900">ชื่อ<span class="required text-red-700">*</span></label>
                <input id="author" name="author" class="block w-full bg-white text-gray-900 border border-gray-200 rounded py-3 px-4" type="text" >
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">อีเมล์<span class="required text-red-700">*</span></label>
                <input id="email" name="email" class="appearance-none block w-full bg-white text-gray-900 border border-gray-200 rounded py-3 px-4 leading-tight" type="text" >
            </div>
            <?php endif; ?>
            <div class="w-full px-3 pt-3">
                <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">ความเห็น <span class="required text-red-700">*</span></label>	
                <textarea id="comment" name="comment" class="appearance-none block w-full bg-white text-gray-900 border border-gray-200 rounded py-3 px-4 leading-tight" rows="7"></textarea>
            </div>
        </div>
        <button name="submit" type="submit" id="submit" class="inline-flex w-full justify-center rounded-md bg-info px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto"><?php _e('ส่งข้อมูล', 'jindatheme') ?></button>
		<!-- <input name="submit" type="submit" id="submit" class="submit blue-button" value="<?php _e('ส่งข้อมูล', 'jindatheme') ?>" /> -->
		<input type="hidden" name="comment_post_ID" id="comment_post_ID" value="<?php echo $post->ID; ?>">
		<input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo isset($queries['replytocom']) ? $queries['replytocom'] : 0 ?>">
	</form>

</section>

<script>
	function removeParam(key, sourceURL) {
		var rtn = sourceURL.split("?")[0],
		param,
		params_arr = [],
		queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
		if (queryString !== "") {
			params_arr = queryString.split("&");
			for (var i = params_arr.length - 1; i >= 0; i -= 1) {
				param = params_arr[i].split("=")[0];
				if (param === key) {
					params_arr.splice(i, 1);
				}
			}
			rtn = rtn + "?" + params_arr.join("&");
		}
		window.location.href = rtn;
	}
</script>