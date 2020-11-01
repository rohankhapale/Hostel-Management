<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">𝐌𝐚𝐢𝐧</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>𓂀 𝔻𝕒𝕤𝕙𝔹𝕠𝕒𝕣𝕕 𓂀</a></li>

<li><a href="book-hostel.php"><i class="fa fa-file-o"></i>𓂀 𝔹𝕠𝕠𝕜 ℍ𝕠𝕤𝕥𝕖𝕝 𓂀</a></li>
<li><a href="room-details.php"><i class="fa fa-file-o"></i>𓂀 ℝ𝕠𝕠𝕞 𝔻𝕖𝕥𝕒𝕚𝕝𝕤 𓂀</a></li>
<li><a href="my-profile.php"><i class="fa fa-user"></i> 𓂀 𝕄𝕪 ℙ𝕣𝕠𝕗𝕚𝕝𝕖 𓂀</a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>𓂀 ℂ𝕙𝕒𝕟𝕘𝕖 ℙ𝕒𝕤𝕤𝕨𝕠𝕣𝕕 𓂀</a></li>
<li><a href="access-log.php"><i class="fa fa-file-o"></i>𓂀 𝔸𝕔𝕔𝕖𝕤𝕤 𝕝𝕠𝕘 𓂀</a></li>
<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> 𓂀 𝕌𝕤𝕖𝕣 ℝ𝕖𝕘𝕚𝕤𝕥𝕣𝕒𝕥𝕚𝕠𝕟 𓂀</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> 𓂀 𝕌𝕤𝕖𝕣 𝕃𝕠𝕘𝕚𝕟 𓂀</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> 𓂀 𝔸𝕕𝕞𝕚𝕟 𝕃𝕠𝕘𝕚𝕟 𓂀</a></li>
				<?php } ?>

			</ul>
		</nav>