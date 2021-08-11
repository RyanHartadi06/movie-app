import NavBar from "./templates/NavBar";
import "./assets/css/tailwind.css";
import {
  HomeFilled,
  VideoCameraFilled,
  InfoCircleFilled,
} from "@ant-design/icons";
import { BrowserRouter, Link } from "react-router-dom";
import { Typography } from "antd";

const { Text } = Typography;

function App() {
  return (
    <BrowserRouter>
      <div className="flex flex-col min-h-screen">
        <NavBar />
        <div className="bg-gray-50 flex-grow">
          <div className="flex flex-row items-stretch">
            <aside className="bg-white flex flex-col w-56 p-2 h-screen absolute hidden sm:flex sm:static transition delay-75 duration-300 ease-in-out">
              <div className="bg-white hover:bg-gray-100 hover:text-red-500 rounded-md px-3 py-2 mb-2 transition delay-75 duration-150 ease-in-out">
                <Link className="flex items-center">
                  <HomeFilled className="mr-2" />
                  <span className="font-normal">Home</span>
                </Link>
              </div>
              <div className="bg-white hover:bg-gray-100 hover:text-red-500 rounded-md px-3 py-2 mb-2 transition delay-75 duration-150 ease-in-out">
                <Link className="flex items-center">
                  <VideoCameraFilled className="mr-2" />
                  <span className="font-normal">Movies</span>
                </Link>
              </div>
              <div className="bg-white hover:bg-gray-100 hover:text-red-500 rounded-md px-3 py-2 transition delay-75 duration-150 ease-in-out">
                <Link className="flex items-center">
                  <InfoCircleFilled className="mr-2" />
                  <span className="font-normal">About</span>
                </Link>
              </div>
            </aside>
            <div className="flex-grow m-4">body</div>
          </div>
        </div>
        <footer className="bg-gray-900">
          <div className="container mx-auto">
            <h4 className="text-white text-2xl py-5">Footer</h4>
          </div>
        </footer>
      </div>
    </BrowserRouter>
  );
}

export default App;
