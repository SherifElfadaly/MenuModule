@if (\MenuRepository::checkMenu($menuSlug))
	<div id='custom-bootstrap-menu' class='navbar navbar-default ' role='navigation'>
		<div class='container-fluid'>
			<div class='collapse navbar-collapse navbar-menubuilder'>
				<ul class='nav navbar-nav navbar-left'>
					{!! \MenuRepository::getRenderMenu($menuSlug) !!}
				</ul> 
			</div>
		</div>
	</div>
@endif
