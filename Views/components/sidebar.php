<aside id="sidebar" class="sidebar">

		  <ul class="sidebar-nav" id="sidebar-nav">

		    <li class="nav-item">
		      <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href=".">
		        <i class="bi bi-grid"></i>
		        <span>Home</span>
		      </a>
		    </li>

		    <li class="nav-item">
		      <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>keranjang">
		        <i class="bi bi-cart-check"></i>
		        <span>Keranjang</span>
		      </a>
		    </li>
			
		    <li class="nav-item">
			<a class="nav-link <?php echo (uri_string() == 'history') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>history">
		        <i class="bi bi-clock"></i>
		        <span>History Belanja</span>
		      </a>
		    </li>

		    <?php
		    if (session()->get('role') == 'admin') {
		    ?>
		      <li class="nav-item">
		        <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>produk">
		          <i class="bi bi-receipt"></i>
		          <span>Produk</span>
		        </a>
		      </li>
			  <li class="nav-item">
		        <a class="nav-link <?php echo (uri_string() == 'user') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>user">
		          <i class="bi bi-people"></i>
		          <span>User</span>
		        </a>
		      </li>
			  <li class="nav-item">
		        <a class="nav-link <?php echo (uri_string() == 'status') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>status">
		          <i class="bi bi-cash"></i>
		          <span>Transaksi</span>
		        </a>
		      </li>
		    <?php

		    }
		    ?>
		  </ul>

		</aside><!-- End Sidebar-->