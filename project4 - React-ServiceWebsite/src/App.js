
import MyNavbar from './component/navbar'
import LandingPage from './component/Landing page/landingPage'
import RegisterForm from './component/RegisterLogin page/RegisterLogin'
import Login from './component/RegisterLogin page/Login'
import AppOne from './component/Profile page/AppOne'
import Booking from './component/Booking page/Booking'
import Footer from './component/footer'

import {BrowserRouter,Route ,Switch} from 'react-router-dom'
import ServicPage from './component/Services page/servicePage'

function App() {
  return (
    <BrowserRouter>
    <div className="App">
<MyNavbar/>
<Switch>
<Route  path="/" exact component={LandingPage} />
 <Route  path="/RegisterForm"  component={RegisterForm} />
 <Route  path="/Login"  component={Login} />
<Route  path="/servicePage"  component={ServicPage} /> 
<Route  path="/Booking"  component={Booking} /> 
 <Route  path="/AppOne"  component={AppOne} />
 {/* <Route  path="/"  component={} /> */}
 

 </Switch>
<Footer/>

    </div>
</BrowserRouter>
  );
}

export default App;
