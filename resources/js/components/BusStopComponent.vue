<template>
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<router-link to="/">
				<div class="sidebar-heading">YgnBuses.com</div>
			</router-link>
			<div class="tabbar_wrapper">
				<table>
				<td class="button-bar home_search_select">
					<router-link to="/">
						<i class="fa fa-bus">
							{{this.busName}}
						</i>
					</router-link>
				</td>
				<td><i class="fa fa-flag"></i></td>
				<td><i class="fa fa-ellipsis-h"></i></td>
				</table>
			</div>
			<div class="list-group list-group-flush">
				<p :key="index"
					v-for="(busStop, index) in busStopInfo" 
					@click="openInfoWindowTemplate(busStop.position, busStop.title)"  class="bus_content mt-0 mb-0">
					<table>
						<td class="busline_color_box"></td>
						<td class="bus-icon"><i class="fa fa-bus"></i></td>
						<td class="bus-no">{{busStop.busStopName}}</td>
						<td class="arrow">></td>
					</table>
				</p>
			</div>
		</div>
		<div id="page-content-wrapper">
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-primary" id="menu-toggle">Help</button>
			</nav>
			<div>
				<GmapMap
				:center="this.center"
				:zoom="14.5"
				map-type-id="terrain"
				style="width: 1800px; height: 950px"
				>
					<GmapMarker
						:key="index"
						v-for="(m, index) in markers"
						:position="m.position"
						:title="m.title"
						:clickable="true"
						:draggable="true"
						@click="openInfoWindowTemplate(m.position, m.title)"
					/>
					<gmap-info-window
						:options="{
						maxWidth: 300,
						pixelOffset: { width: 0, height: -35 }
						}"
						:position="infoWindow.position"
						:opened="infoWindow.open"
						@closeclick="infoWindow.open=false">
						<div v-html="infoWindow.template"></div>
					</gmap-info-window>
					<gmap-polygon 
						:key="'path_' + pathIndex"
						v-for="(ybsPath, pathIndex) in ybsPaths"
						:path="ybsPath">
					</gmap-polygon>
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

	export default {
      	name: "busStopComponent",
		data() {
			return {
				center: {lat: 0, lng: 0},
				busStopInfo: [],
				busName: '',
				ybsPaths: [],
				markers: [],
				infoWindow: {
					position: {lat: 0, lng: 0},
					open: false,
					template: ''
				},
			};
		},
		methods: {
			openInfoWindowTemplate(position, title) {
				this.infoWindow.position = position
				this.infoWindow.template = "<label style='color: red;'>" + title + "</label>"
				this.infoWindow.open = true
        	},
			getBusStops() {
				axios.get('/api/getBusStop/' + this.$route.params.busId)
				.then(
					response => {
						response.data.forEach((element, index) => {
							if (index == 0) {
								this.center = { 'lat': parseFloat(element.stop_latitude), 'lng': parseFloat(element.stop_longitude) };
								this.busName = element.bus_name;
							}
							this.busStopInfo.push({
								busStopId: element.stop_id.toString(),
								busStopName: element.stop_name,
								position: { lat: parseFloat(element.stop_latitude), lng: parseFloat(element.stop_longitude) },
								title: element.stop_name,
							});
							this.markers.push(
								{
									position: { 'lat': parseFloat(element.stop_latitude), 'lng': parseFloat(element.stop_longitude) },
									title: element.stop_name,
								},
							);
							this.ybsPaths.push( 
								[{'lat': parseFloat(element.stop_latitude), 'lng': parseFloat(element.stop_longitude)}, 
								{'lat': parseFloat(element.next_stop_latitude), 'lng': parseFloat(element.next_stop_longitude)}]
							);
						});
					}
				)
				.catch(
					error => {
						console.log(error);
					}
				);
			}
		},
		created() {
			this.getBusStops();
		},
		mounted() {
			// 
		}
	};
</script>
