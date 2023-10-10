<template>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            
          </tr>
        </thead>
        <tbody v-if="categories.length>0">
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>          
        </tbody>
        <tbody v-else>
        <tr>
        <td colspan="4" class="text-center"><h3  class="text-danger">No Records Found!</h3></td>
        </tr>
        </tbody>
      </table>
</template>

<script>
    export default {
          name:"categories",
    data(){
        return {
            categories:[]
        }
    },
        mounted() {
            console.log('Component mounted.');
            this.getCategories()
        },
        methods:{
          async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        }
    }
</script>
