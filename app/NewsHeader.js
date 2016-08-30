import React from 'react';
import imageLogo from './y18.gif';
import './NewsHeader.css';

export default class NewsHeader extends React.Component {
    getLogo() {
        return (
            <div className="newsHeader-logo">
                <a href=""><img src={imageLogo} /></a>
            </div>
        );
    }

    getTitle() {
        return (
            <div className="newsHeader-title">
                <a className="newsHeader-textLink" href="http://allowing.weiwait.top">Hacker News</a>
            </div>
        );
    }

    getNav() {
        let navLinks = [
            {
                name: 'new',
                url: 'newest'
            }, {
                name: 'comments',
                url: 'newcomments'
            }, {
                name: 'show',
                url: 'show'
            }, {
                name: 'ask',
                url: 'ask'
            }, {
                name: 'jobs',
                url: 'jobs'
            }, {
                name: 'submit',
                url: 'submit'
            }
        ];

        return (
            <div className="newsHeader-nav">
                {
                    navLinks.map((navLink) => {
                        return (
                            <a key={navLink.url} className="newsHeader-navLink newsHeader-textLink" href={'http://allowing.weiwait.top/' + navLink.url}>
                                {navLink.name}
                            </a>
                        );
                    })
                }
            </div>
        );
    }

    getLogin() {
        return (
            <div className="newsHeader-login">
                <a className="newsHeader-textLink" href="http://allowing.weiwait.top">login</a>
            </div>
        );
    }

    render() {
        return (
            <div className="newsHeader">
                {this.getLogo()}
                {this.getTitle()}
                {this.getNav()}
                {this.getLogin()}
            </div>
        );
    }
}
