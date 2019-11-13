import React, { Component } from 'react';
import axios from 'axios';

class Header extends Component {
    constructor(props) {
        super(props);
        this.state = {
            shashin: ''
        };
    }

    getShashin() {
        axios.get('/shashin').then((
            response
        ) =>
            this.setState({
                shashin: [...response.data.shashin]
            })
        );
    }

    UNSAFE_componentWillMount() {
        this.getShashin();
    }


    render() {
        return (
            <div className="app-header header-shadow bg-sunny-morning header-text-dark">
                <div className="app-header__logo">
                    <div className="loogoo">RSUntan</div>
                    <div className="header__pane ml-auto">
                        <div>
                            <button type="button" className="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span className="hamburger-box">
                                    <span className="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div className="app-header__mobile-menu">
                    <div>
                        <button type="button" className="hamburger hamburger--elastic mobile-toggle-nav">
                            <span className="hamburger-box">
                                <span className="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div className="app-header__menu">
                    <span>
                        <button type="button" className="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span className="btn-icon-wrapper">
                                <i className="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div className="app-header__content">
                    {/* <div className="app-header-left">
                        <div className="search-wrapper">
                            <div className="input-holder">
                                <input type="text" className="search-input" placeholder="Type to search" />
                                <button className="search-icon"><span></span></button>
                            </div>
                            <button className="close"></button>
                        </div>
                        <ul className="header-menu nav">
                            <li className="nav-item">
                                <a href="javascript:void(0);" className="nav-link">
                                    <i className="nav-link-icon fa fa-database"> </i>
                                    Statistics
                    </a>
                            </li>
                            <li className="btn-group nav-item">
                                <a href="javascript:void(0);" className="nav-link">
                                    <i className="nav-link-icon fa fa-edit"></i>
                                    Projects
                    </a>
                            </li>
                            <li className="dropdown nav-item">
                                <a href="javascript:void(0);" className="nav-link">
                                    <i className="nav-link-icon fa fa-cog"></i>
                                    Settings
                    </a>
                            </li>
                        </ul>
                    </div> */}
                    <div className="app-header-right">
                        <div className="header-btn-lg pr-0">
                            <div className="widget-content p-0">
                                <div className="widget-content-wrapper">
                                    <div className="widget-content-left">
                                        <div className="btn-group">
                                            <a data-togel="dropdown" aria-haspopup="true" aria-expanded="false" className="p-0 btn">
                                                <img width="42" className="rounded-circle" src="/sjabloon/assets/images/avatars/1.jpg" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div className="widget-content-left  ml-3 header-user-info">
                                        <div className="widget-heading">
                                            {/* {this.state.shashin.map(shashin => {shashin.name})} */}
                            </div>
                                        <div className="widget-subheading">
                                            Teller
                            </div>
                            <a href="logout"> <div className="widget-heading">
                                        Logout <i class="fa fa-fw" aria-hidden="true" title="Copy to use power-off"></i>
                            </div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Header;
