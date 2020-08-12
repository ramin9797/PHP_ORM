import React, { Component } from 'react';
import ReactDOM from 'react-dom';


class Test2 extends Component {


    constructor(props) {
        super(props);
    }

    render() {
        return (
            <h1>Test</h1>
        );
    }
}

export default Test2;

if(document.getElementById("react_test")){
	ReactDOM.render(<Test2/>,document.getElementById("react_test"))
}
