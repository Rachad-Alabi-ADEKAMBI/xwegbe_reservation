const { createApp } = Vue
createApp({
   data() {
       return {
           appartments:[
               /*
               { id: '1', name: 'appartement 1', price: '50 000', short_description: 'Lorem ipsum dolor sit amet consectetur adipisicing elitm  Lorem ipsum dolor sit amet consectetur adipisicing elitm ', rooms: '2', picture_1: 'https://www.xwegbe.com/wp-content/uploads/2022/05/appartement1-1.jpg'},
                */
           ],
           picture_1: 'https://www.xwegbe.com/wp-content/uploads/2022/05/appartement1-1.jpg',
       errorMsg: "",
       successMsg: '', 
           allData: '',
           msg: '',
           addAppartment: true,
           bookAppartment: true,
           editAppartment: true,
           deleteAppartment: true,
           newAppartment: { },
           showBookings: true,
           bookings: []
       }
       },
       mounted: function(){
           this.getAllAppartments();
           this.getAllBookings();
       //  this.fetchAllData();
       },
           methods: {
               getAllAppartments(){
               axios.get("functions.php?action=getAllAppartments").then(response => this.appartments = response.data);
           },
           addAppartment(){
           var FormData = app.toFormData(app.newAppartment);
           axios.post("model.php?action=addAppartment").then(function(response){
           app.newAppartment = {name: "" /*, price:"", location:"", short_description:"", 
           long_description: "", picture_1: "", picture_2: "", picture_3: "", picture_4: "", 
           picture_5: "", wi_fi: "", air_conditionner: "",  free_parking: "", dryer: "",
           oven:" ", fridge: "", tv: "", private_entrance: "", dishes: "" */}

           /*  if(response.data.error){
               app.errorMsg = response.data.message;
               this.errorMessage = response.data.message;
           }
           else{
               app.successMsg= response.data.message;
               this.message = 'Inscription réussie, un email de confirmation vous sera envoyé pour la création de votre compte';
               //  $router. push({ name: "/"})
               alert("ok");
               
           }
           */
           alert("js");
       });
       },
       toFormData(obj){
           var  fd = new FormData();
           for(var i in obj){
               fd.append(i, obj[i]);
           }
           return fd;
       }
       
       }
}).mount('#app')