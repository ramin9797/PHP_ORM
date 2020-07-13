import React,{Component} from 'react';
import ReactDOM from 'react-dom';

export default class Aside extends React.Component{


    render() {

        return (
              <aside className="right_side">
                <div className="best-articles">
                <h2>Популярное</h2>  
                <ul>
                    <li>1 Статья</li>
                    <li>2 Статья</li>
                    <li>3 Статья</li>

                </ul>
                </div>

                 <div className="best-articles">
                <h2>Популярное</h2>  
                <ul>
                    <li>1 Статья</li>
                    <li>2 Статья</li>
                    <li>3 Статья</li>
                </ul>
                </div>

                 <div className="best-articles">
                <h2>Реклама</h2>  
                <ul>
                    <li>1 Статья</li>
                    <li>2 Статья</li>
                    <li>3 Статья</li>
                </ul>
                </div>
            </aside>

        )
    }

}