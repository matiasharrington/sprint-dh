<footer class="navbar navbar-inverse">
			<ul>
				<li>
					<a href="http://www.facebook.com" target="_blank" id="icon-face"><img src="../IMAGE/facebook.png"> Facebook</a>
				</li>
				<li>
					<a href="http://www.instagram.com" target="_blank" id="icon-insta"><img src="../IMAGE/instagram.png"> Instagram</a>
				</li>
				<li>
					<a href="http://www.twitter.com" target="_blank" id="icon-twitt"><img src="../IMAGE/twitter.png"> Twitter</a>
				</li>
			</ul>
			<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../IMAGE/top.png"></button>
			<script type="text/javascript">
				window.onscroll = function() {scrollFunction()};

				function scrollFunction() {
				    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
				        document.getElementById("myBtn").style.display = "block";
				    } else {
				        document.getElementById("myBtn").style.display = "none";
				    }
				}

				function topFunction() {
				    document.body.scrollTop = 0;
				    document.documentElement.scrollTop = 0;
				}
			</script>
			<h6 id="copyright">Copyright &copy; 2017 Plantex Express SA Todos los derechos reservados</h6>	
		</footer>
	</body>
</html>
