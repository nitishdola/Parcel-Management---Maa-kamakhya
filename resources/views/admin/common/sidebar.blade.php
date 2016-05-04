<div id="sidebar-content">
	<!--=== Navigation ===-->
	<ul id="nav">
		<li class="current">
			<a href="{{ route('admin_dashboard') }}">
				<i class="icon-dashboard"></i>
				Dashboard
			</a>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Orders
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('admin.order.create') }}">
						<i class="icon-angle-right"></i>
						Add New Order
					</a>
				</li>
				<li>
					<a href="{{ route('admin.order.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Users
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('user.create') }}">
					<i class="icon-angle-right"></i>
					Add
					</a>
				</li>
				<li>
					<a href="{{ route('user.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>
			</ul>
		</li>
	</ul>

</div>