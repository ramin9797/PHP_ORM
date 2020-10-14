import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCoffee } from '@fortawesome/free-solid-svg-icons'





class Test3 extends Component {


    constructor(props) {
        super(props);
         this.state = { 
             file:null
          };

          this.onSubmit = this.onSubmit.bind(this)
          this.onChange = this.onChange.bind(this)
          this.uploadFile = this.uploadFile.bind(this)



          // 

    }
    // 


    // 

     onSubmit(e){
        e.preventDefault() 
        let res =  this.uploadFile(this.state.file);
        console.log(res.data);
    }

    uploadFile(file){

        const formData = new FormData();

        formData.append('avatar',file)

        axios.post("http://localhost/php_projs/project2/test/get_pdf", formData,{
            headers: {
                'content-type': 'multipart/form-data'
            }
        }).then(response=>{
         console.log(response)
      }).catch(error=>{
       console.log(error)
      })
      }

    onChange(e) {
        this.setState({file:e.target.files[0]})

    }



    render() {

        return (

        
          <div className="pdf_header">




          <form onSubmit={ this.onSubmit }>
            <h1> React File Upload Example</h1>
            <label htmlFor="image_avatar"><i className="fa fa-user-circle"></i></label>
            <input type="file" id="image_avatar" onChange={ this.onChange } />
            <button type="submit">Upload File</button>
          </form>

              
             
              
              
       </div>

        );
    }
}







export default Test3;

if(document.getElementById("react_test_2")){
	ReactDOM.render(<Test3/>,document.getElementById("react_test_2"))
}
