import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCoffee } from '@fortawesome/free-solid-svg-icons'
import PDF_header from "./Cv/Header";


class Test2 extends Component {


    constructor(props) {
        super(props);
        this.state = {

        }


    }



    render() {
        return (
        	<div className="div_pdf">

        	<PDF_header />
        	<PDF_categories/>

        	 



            </div>

        );
    }
}








class PDF_categories extends Component{

	render(){
		return(
				<div>
					<h1>Hello</h1>
				</div>
			)
	}

}

export default Test2;

if(document.getElementById("react_test_2")){
	ReactDOM.render(<Test2/>,document.getElementById("react_test_2"))
}
