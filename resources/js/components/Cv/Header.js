import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
export default class PDF_header extends Component {

	 constructor(props) {
        super(props);
        this.state = {
        	 imageUrl:'',
        	 IsImageUploaded:false,
        	 isAvatarSetTings:true,
        }

         this.imgOnClick = this.imgOnClick.bind(this)
         this.DeleteAvatar = this.DeleteAvatar.bind(this)
         this.fileInput = React.createRef();


         // 
         	this.onSubmit = this.onSubmit.bind(this)
         	this.uploadFile = this.uploadFile.bind(this)
         	this.onChange = this.onChange.bind(this)
         // 

         //
         this.Upload_All_info = this.Upload_All_info.bind(this)
         this.Send_user_data = React.createRef()
         //
    }

    Upload_All_info(){
    	this.Send_user_data.current.submit()
    }



     onSubmit(e){
        e.preventDefault() 
        let res =  this.uploadFile(this.state.file);
        // console.log(res.data);
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

        const avatar_image = this.state.file;
        const imageUrl = "../resources/images/"+avatar_image.name;

	    	
	    	this.setState({
	    		imageUrl:imageUrl,
	    		isAvatarSetTings:true
	    	})
      }).catch(error=>{
       console.log(error)
      })
      }


    imgOnClick(event){
    	const currentState = this.state.isAvatarSetTings;
    	this.setState({
    		isAvatarSetTings:!currentState,
    		IsImageUploaded:true,
    	})
    }





    onChange(e) {
        this.setState({file:e.target.files[0]})
    }



    	
  



    // }

    DeleteAvatar(){
    	this.setState({
    		imageUrl:false,
    		isAvatarSetTings:true
    	})
    	    }

  

	render(){

	    let image;
	    if (this.state.imageUrl) {
	      image =  <img onClick={this.imgOnClick} src={this.state.imageUrl} className="pfd_avatar_image" alt="avatar_image"/>;
	    } else {
	      image =
	      <form onSubmit={ this.onSubmit }>
            <label htmlFor="image_avatar"><i className="fa fa-user-circle"></i></label>
             <input type="file" id="image_avatar" ref={this.fileInput} onChange={this.onChange}/>
            <button type="submit" className="pdf_avatar_submit">End Upload</button>
          </form>
	  }

	  let label;

	  if(this.state.IsImageUploaded){

	  	label = 
	  	<form onSubmit={ this.onSubmit }>
	  	 <input type="file" id="image_avatar" ref={this.fileInput} onChange={this.onChange}/>
	  		<label htmlFor="image_avatar"><i className="fa fa-upload">Upload</i></label>
	  	 <button type="submit" className="pdf_avatar_submit">End Upload</button>
	  	</form>
	  }
	  else
	  	label= "";


		return (
			<div className="react_test_2_inline">
			<div className="cv_settings">
				<button className="upload_pdf" onClick={this.Upload_All_info}>Upload</button>

			</div>


			<div className="pdf_header">


		          
	         <div className="user_avatar">
		         	{image}
		         <div className={`user_avatar_settings  ${this.state.isAvatarSetTings?"hide_block":"show_block"}`  }>
		         	  {label}
		         	 <i onClick={this.DeleteAvatar} className="fa fa-trash delete_avatar"></i>
		         	 <input type="file" id="image_avatar" ref={this.fileInput} onChange={this.FileChanger}/>
		         </div>
	         </div>

		         <div className="user_informations">

		         <form method="Post" action='../test/pdf' ref={this.Send_user_data}>
				  <input type="text" name="pdf_user_name"  placeholder="Your name"/>
		          <input type="text" name="pdf_user_profession"  placeholder="Professional title"/>
		          <input type="text" name="pdf_user_more_info" placeholder="About you"/>
		          </form>
				</div>
		          
		          
			</div>

			</div>

			)
	}

}