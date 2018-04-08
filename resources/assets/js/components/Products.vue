<template>	
	<div class="konten">
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
		<hr>
		<div class="title">
			SHOPPING CART - {{ count }} items
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<table class="table table-bordered">
					<tr>
						<td class="text-center"></td>
						<td class="text-center">Product</td>
						<td class="text-center">Price</td>
						<td class="text-center" width="5%">Quantity</td>
						<td class="text-center">Total</td>
					</tr>
					<tr v-for="item,i in cart">
						<td class="text-center">
							<button class="close" @click="del(i,item)">x</button>
						</td>
						<td>
							<img :src="''+item.image+''" class="gambar-detail">
							<div class="nama-detail">{{ item.name }}</div>
						</td>
						<td class="text-center">
							<div class="harga-detail">{{ formatUang(item.price) }}</div>
						</td>
						<td>
							<input type="text" :value="+item.qty" class="form-control" disabled>
						</td>
						<td class="text-center">
							<div class="harga-detail">{{ formatUang(item.price) }}</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="harga-detail">{{ formatUang(total) }}</td>
					</tr>
				</table>
			</div>
			<div class="col-md-1"></div>
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
				gambarShirt : {},
				cart : []
			}
		},
		mounted () {
			this.getProducts()
		},
		computed: {
			count: function count() {
		      	return this.cart.reduce(function (n, cart) {
		        	return cart.qty + n;
		        }, 0);
		    },
		    total: function total() {
		      	return this.cart.reduce(function (n, cart) {
		        	return cart.price * cart.qty + n;
		      	}, 0).toFixed(2);
		    }
		},
		methods: {
			formatUang(value) {
		        let val = (value/1).toFixed(2).replace('.', ',')
		        return 'Rp. '+ val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
		    },
		    addToCart(product) {
		    	this.$set(product, 'qty', +1);
      			this.cart.push(product);
		    },
		    del: function del(index, id) {
		    	this.cart.splice(index, 1);
		        this.unblock(id);
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