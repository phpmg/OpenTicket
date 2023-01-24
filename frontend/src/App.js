import { ThemeProvider } from '@emotion/react';
import { createTheme } from '@mui/material';
import './App.css';
import LoginPage from './pages/LoginPage';

const theme = createTheme();

function App() {
  return (
    <ThemeProvider theme={theme}>
      <LoginPage />
    </ThemeProvider>
  );
}

export default App;
