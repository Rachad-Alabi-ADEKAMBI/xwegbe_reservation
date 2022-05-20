const { createApp } = Vue

createApp({
  data() {
    return {
      appartments:[],
      errorMsg: "",
          allData: ''
      }
      },
      mounted: function(){
          this.getAllAppartments();
      //  this.fetchAllData();
      },
          methods: {
            getAllAppartments(){
              axios.
              get( <?php  ?> "model.php?action=getAllAppartments").then(response => this.appartments = response.data);
             //axios.get("https://mocki.io/v1/d4867d8b-b5d5-4a48-a4ab-79131b5809b8").then(response => this.appartments = response.data);
              
           }
    }
}).mount('#app')