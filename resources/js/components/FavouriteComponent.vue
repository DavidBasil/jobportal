<template>
  <div class="mt-2">
    <button 
      v-if="show" 
      @click.prevent="save()"
      type="submit" 
      class="btn btn-info w-100 text-white">SAVE</button>
    <button v-else 
      @click.prevent="unsave()"
      class="btn btn-success w-100">UNSAVE</button>
  </div>
</template>

<script>
export default {
  props:['jobid'],
  mounted() {
    console.log('Component mounted.')
  },
  data(){
    return {
      'show': true
    } 
  },
  methods: {
    save(){
	axios.post('/save/'+this.jobid)
	.then(response=>this.show=false)
	.catch(error=>alert('error'))
    },
    unsave(){
	axios.post('/unsave/'+this.jobid)
	.then(response=>this.show=true)
	.catch(error=>alert('error'))
    }
  }
}
</script>
