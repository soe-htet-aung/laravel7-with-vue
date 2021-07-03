<template>
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">YgnBuses.com</div>
			<div class="tabbar_wrapper">
				<table>
				<td class="button-bar home_search_select">
					<a href="/"><i class="fa fa-bus"></i></a>
				</td>
				<td><i class="fa fa-flag"></i></td>
				<td><i class="fa fa-ellipsis-h"></i></td>
				</table>
			</div>
			<div class="list-group list-group-flush">
				<div class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">Bus stop ၁</td>
						<td class="arrow">></td>
					</table>
				</div>
				<div class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">Bus stop ၂</td>
						<td class="arrow">></td>
					</table>
				</div>
				<div class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">Bus stop ၃</td>
						<td class="arrow">></td>
					</table>
				</div>
				<div class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">Bus stop ၄</td>
						<td class="arrow">></td>
					</table>
				</div>
				<div class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">Bus stop ၅</td>
						<td class="arrow">></td>
					</table>
				</div>
			</div>
		</div>
		<div id="page-content-wrapper">
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-primary" id="menu-toggle">Help</button>
			</nav>
			<div>
				<GmapMap
				:center="center"
				:zoom="16"
				map-type-id="terrain"
				style="width: 1800px; height: 850px"
				>
					<GmapMarker
						:key="index"
						v-for="(m, index) in markers"
						:position="m.position"
						:title="m.title"
						:clickable="true"
						:draggable="true"
						@click="center=m.position"
					/>
					<gmap-polygon :paths="path1"></gmap-polygon>>
					<gmap-polygon :paths="path2"></gmap-polygon>>
					<gmap-polygon :paths="path3"></gmap-polygon>>
					<gmap-polygon :paths="path4"></gmap-polygon>>
				</GmapMap>
			</div>
		</div>
	</div>
</template>

<script>
	//Bootstrap libraries
	import "bootstrap/dist/css/bootstrap.min.css";
	import "bootstrap/dist/js/bootstrap.min.js";
	//jquery, popper.js libraries for bootstrap
	import "jquery/dist/jquery.min.js";
	import "popper.js/dist/umd/popper.min.js";

	const home = { lat: 16.876745691242057, lng: 96.19321341221833 };
	const target = { lat: 16.875328872925426, lng: 96.19162554461047 };
	const target1 = { lat: 16.874102108886525, lng: 96.19085352377988 };
	const target2 = { lat: 16.873629721798352, lng: 96.18887452968595 };
	const target3 = { lat: 16.872731653839697, lng: 96.18718339394852 };

	export default {
      	name: "busComponent",
		data() {
			return {
				center: home,
				markers: [],
				path1: [],
				path2: [],
				path3: [],
				path4: [],
			};
		},
		methods: {
			drawMarker() {
				this.markers = [
					{
						position: home,
						title: "Home ",
					},
					{
						position: target,
						title: "Titel 0",
					},
					{
						position: target1,
						title: "Titel 1",
					},
					{
						position: target2,
						title: "Titel 2",
					},
					{
						position: target3,
						title: "Titel 3",
					},
				];
				this.path1 = [home, target];
				this.path2 = [target, target1];
				this.path3 = [target1, target2];
				this.path4 = [target2, target3];

			},
		},
		mounted() {
			this.drawMarker();
		}
	};
</script>
