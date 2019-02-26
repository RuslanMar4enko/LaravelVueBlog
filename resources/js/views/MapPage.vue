<template>
  <div>
    <div class="container">
      cdcdcdcdcdc
      <mapbox
        access-token="pk.eyJ1Ijoid2hpZSIsImEiOiJjanNhNjBheTcwNmJuNDRueG80YXA2eW1kIn0.0UcnBKjDMoM27qVCKMPb0w"
        :map-options="{
  style: 'mapbox://styles/mapbox/light-v9',
  center: [-96, 37.8],
  zoom: 3
}"
        :geolocate-control="{
  show: true,
  position: 'top-left'
}"
        :scale-control="{
  show: true,
  position: 'top-left'
}"
        :fullscreen-control="{
  show: true,
  position: 'top-left'
}">
      </mapbox>
    </div>
  </div>
</template>

<script>
  import Mapbox from "mapbox-gl-vue";

  export default {
  	data() {
  		return {
  			accessToken: "pk.eyJ1Ijoid2hpZSIsImEiOiJjanNhNjBheTcwNmJuNDRueG80YXA2eW1kIn0.0UcnBKjDMoM27qVCKMPb0w",
  		};
  	},

  	components: {
  		Mapbox
  	},

  	methods: {
  	}

  };
</script>
