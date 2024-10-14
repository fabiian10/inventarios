import React from 'react';
import ReactDOM from 'react-dom';

function Dashboard() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Welcome Dashboard</div>

                        <div className="card-body">
                            <h1>Welcome to Your Dashboard</h1>
                            <p>This is your new React component in Laravel!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Dashboard;

if (document.getElementById('dashboard')) {
    ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
}