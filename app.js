const { createApp } = Vue
//const cors = require('cors');
//app.use(cors());

createApp({
  data() {
    return {
      id: '1',
      name: 'appartement 1',
      price: '50 000 F CFA',
      short_description: 'Lorem ipsum dolor sit amet consectetur adipisicing elitm  Lorem ipsum dolor sit amet consectetur adipisicing elitm',
      long_description: 'Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elitm  Lorem ipsum dolor sit amet consectetur adipisicing elitm',
      rooms: '2',
        errorMsg: "",
      allData: ''
      }
      },
      mounted: function(){
      //    this.getAllAppartments();
      //  this.fetchAllData();
      },
          methods: {
            getAAppartment(){
              //axios.get("/model.php?action=getAllAppartments").then(response => this.appartments = response.data);
             axios.get("https://xwegbe.com/wp-content/plugins/liste-appartements/model.php?action=getAllAppartments").then(response => this.appartments = response.data);
              
           }
    }
}).mount('#app')
