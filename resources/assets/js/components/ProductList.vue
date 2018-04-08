<template>
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<img v-bind:src="gambarToy">
			</div>
			<div class="detail">
				<div class="kiri-min">
					<div class="nama">{{ toy1.name }}</div>
					<div class="harga">{{ formatUang(toy1.price) }}</div>
				</div>
				<div class="kanan-min">
					<button class="btn btn-warning" @click='addToCart(toy1)'>ADD TO CART</button>
				</div>
			</div>
			<div class="card">
				<img v-bind:src="gambarToy">
			</div>
			<div class="detail">
				<div class="kiri-min">
					<div class="nama">{{ toy2.name }}</div>
					<div class="harga">{{ formatUang(toy2.price) }}</div>
				</div>
				<div class="kanan-min">
					<button class="btn btn-warning" @click='addToCart(toy2)'>ADD TO CART</button>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<img v-bind:src="gambarIphone">
			</div>
			<div class="detail">
				<div class="kiri-min">
					<div class="nama">{{ iphone.name }}</div>
					<div class="harga">{{ formatUang(iphone.price) }}</div>
				</div>
				<div class="kanan-min">
					<button class="btn btn-warning" @click='addToCart(iphone)'>ADD TO CART</button>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<img v-bind:src="gambarShirt">
			</div>
			<div class="detail">
				<div class="kiri-min">
					<div class="nama">{{ shirt1.name }}</div>
					<div class="harga">{{ formatUang(shirt1.price) }}</div>
				</div>
				<div class="kanan-min">
					<button class="btn btn-warning" @click='addToCart(shirt1)'>ADD TO CART</button>
				</div>
			</div>
			<div class="card">
				<img v-bind:src="gambarShirt">
			</div>
			<div class="detail">
				<div class="kiri-min">
					<div class="nama">{{ shirt2.name }}</div>
					<div class="harga">{{ formatUang(shirt2.price) }}</div>
				</div>
				<div class="kanan-min">
					<button class="btn btn-warning" @click='addToCart(shirt2)'>ADD TO CART</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>	
	export default {
		data() {
			return {
				iphone : {
					id : 0,
					image : '',
					price : '',
					name  : ''
				},
				gambarIphone : {},
				toy1 : {
					id : 0,
					image : '',
					price : '',
					name  : ''
				},
				toy2 : {
					id : 0,
					image : '',
					price : '',
					name  : ''
				},
				gambarToy : {},
				shirt1 : {
					id : 0,
					image : '',
					price : '',
					name  : ''
				},
				shirt2 : {
					id : 0,
					image : '',
					price : '',
					name  : ''
				},
				gambarShirt : {}
			}
		},
		mounted () {
			this.getProducts()
		},
		methods: {
			formatUang(value) {
		        let val = (value/1).toFixed(2).replace('.', ',')
		        return 'Rp. '+ val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
		    },
		    addToCart(value) {
		    	alert(value)
		    },
			getProducts(){
				axios.get('api/product').then(response => {
					this.iphone = response.data[0], //iphone7
					this.gambarIphone = response.data[0].image,
					this.toy1 = response.data[1], //toys
					this.toy2 = response.data[3], 
					this.gambarToy = response.data[1].image
					this.shirt1 = response.data[2], //shirt
					this.shirt2 = response.data[4], 
					this.gambarShirt = response.data[2].image
				} 
			)}
		}
	}
</script>

<style>
	
</style>