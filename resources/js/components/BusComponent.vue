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
				<router-link to="busline/1" class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">၁</td>
						<td class="arrow">></td>
					</table>
				</router-link>
				<router-link to="busline/2" class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">၂</td>
						<td class="arrow">></td>
					</table>
				</router-link>
				<router-link to="busline/3" class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">၃</td>
						<td class="arrow">></td>
					</table>
				</router-link>
				<router-link to="busline/4" class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">၄</td>
						<td class="arrow">></td>
					</table>
				</router-link>
				<router-link to="busline/5" class="bus_content">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">၅</td>
						<td class="arrow">></td>
					</table>
				</router-link>
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

	const home = { lat: 16.876745691242057, lng: 96.19321341221833} ;

	export default {
      	name: "busComponent",
		data() {
			return {
				center: home,
				markers: [],
			};
		},
		methods: {
		},
	};
</script>
