import React from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function MainLayout({ children }) {
  const { component } = usePage();

  return (
    <div className="app">
      {/* Header */}
      <header style={styles.header}>
        <div style={styles.logo}>MyLogo</div>
        <nav>
          <Link href='/' style={component === 'Home' ? styles.activeLink : styles.link}>Home</Link>
          {/* <Link href={route('event')} style={component === 'Event' ? styles.activeLink : styles.link}>Event</Link> */}
          <Link href="/training" style={component === 'Training' ? styles.activeLink : styles.link}>Training</Link>
          {/* <Link href={route('gallery')} style={component === 'Gallery' ? styles.activeLink : styles.link}>Gallery</Link> */}
        </nav>
      </header>

      {/* Main content */}
      <main style={{ padding: '20px', minHeight: '80vh' }}>
        {children}
      </main>

      {/* Footer */}
      <Footer />
    </div>
  );
}

function Footer() {
  const [datetime, setDatetime] = React.useState(new Date());

  React.useEffect(() => {
    const timer = setInterval(() => setDatetime(new Date()), 1000);
    return () => clearInterval(timer);
  }, []);

  return (
    <footer style={styles.footer}>
      <p>{datetime.toLocaleString()}</p>
    </footer>
  );
}

const styles = {
  header: {
    display: 'flex',
    justifyContent: 'space-between',
    alignItems: 'center',
    padding: '10px 20px',
    backgroundColor: '#333',
    color: '#fff'
  },
  logo: { fontWeight: 'bold', fontSize: '20px' },
  link: { margin: '0 10px', color: '#fff', textDecoration: 'none' },
  activeLink: { margin: '0 10px', color: '#ffd700', textDecoration: 'underline' },
  footer: {
    textAlign: 'center',
    padding: '10px 0',
    backgroundColor: '#333',
    color: '#fff'
  }
};
