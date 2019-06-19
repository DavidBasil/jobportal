<template>
  <div class="mt-2">
    <button 
      v-if="show" 
      @click.prevent="unsave()"
      class="btn btn-info w-100 text-white">UNSAVE</button>
    <button v-else 
      @click.prevent="save()"
      class="btn btn-success w-100">SAVE</button>
  </div>
</template>

<script>
export default {
  props:['jobid', 'favourited'],
  data(){
    return {
      'show': true
    } 
  },
  mounted(){
    this.show = this.jobFavourited ? true : false;
  },
  computed: {
    jobFavourited(){
      return this.favourited
    }
  },
  methods: {
    save(){
	axios.post('/save/'+this.jobid)
	.then(response=>this.show=true)
	.catch(error=>alert('error'))
    },
    unsave(){
	axios.post('/unsave/'+this.jobid)
	.then(response=>this.show=false)
	.catch(error=>alert('error'))
    }
  }
}
</script>
