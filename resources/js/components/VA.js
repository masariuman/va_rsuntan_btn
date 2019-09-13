import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Sidebar from './sjabloon/Sidebar';
import Footer from './sjabloon/Footer';
import Header from './sjabloon/Header';


if (document.getElementById('sidebar')) {
    ReactDOM.render(<Sidebar />, document.getElementById('sidebar'));
}

if (document.getElementById('foooter')) {
    ReactDOM.render(<Footer />, document.getElementById('foooter'));
}

if (document.getElementById('header')) {
    ReactDOM.render(<Header />, document.getElementById('header'));
}

