import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Sidebar from './sjabloon/Sidebar';


if (document.getElementById('sidebar')) {
    ReactDOM.render(<Sidebar />, document.getElementById('sidebar'));
}
