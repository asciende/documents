<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tarjeta — Carlos Moretti</title>
  <meta name="description" content="Tarjeta personal de Carlos Moretti, desarrollador." />
  <style>
    :root{
      --bg:#0b1220;       /* fondo página */
      --card:#ffffff;     /* fondo tarjeta */
      --ink:#0f172a;      /* texto principal */
      --muted:#475569;    /* texto secundario */
      --accent:#eab308;   /* dorado sutil */
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0; display:grid; place-items:center; min-height:100%;
      background:
        radial-gradient(1000px 600px at 20% 10%, rgba(255,255,255,.06), transparent 60%),
        linear-gradient(135deg, #0b1220, #121a33 70%, #1e2a55);
      font-family: system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,"Helvetica Neue",Arial,sans-serif;
      color:var(--ink);
    }

    .card{
      width: min(560px, 92vw);
      background: var(--card);
      border-radius: 20px;
      padding: 28px 28px;
      box-shadow: 0 20px 50px rgba(2,8,23,.25), 0 2px 8px rgba(2,8,23,.18);
      position: relative;
      isolation: isolate;
    }
    /* borde superior sutil */
    .card::before{
      content:""; position:absolute; inset:0; border-radius:20px;
      padding:1px; background: linear-gradient(90deg, rgba(234,179,8,.6), rgba(234,179,8,0));
      -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask-composite: xor; mask-composite: exclude; pointer-events:none;
    }

    .name{
      font-weight: 800; letter-spacing:.2px; color:#0b1220;
      font-size: clamp(28px, 4vw, 36px); line-height:1.1;
    }
    .role{
      margin-top:6px; color:var(--muted); font-size: clamp(14px, 2.2vw, 16px);
    }

    .items{ margin-top:20px; display:grid; gap:10px }
    .item{
      display:flex; align-items:center; gap:10px;
      padding: 12px 14px; border:1px solid rgba(2,8,23,.08); border-radius:12px;
      transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
    }
    .item:hover{
      transform: translateY(-1px);
      box-shadow: 0 10px 24px rgba(2,8,23,.08);
      border-color: rgba(234,179,8,.45);
    }
    .badge{
      width:28px;height:28px; border-radius:9px; display:grid; place-items:center;
      background: rgba(234,179,8,.12); color:#7c5b00; font-weight:700; font-size:13px;
      flex: 0 0 auto;
    }
    .label{ color:#0b1220; font-weight:600; }
    .value a{ color:var(--muted); text-decoration:none }
    .value a:hover{ color:#0b1220; text-decoration:underline }

    /* Botón para descargar vCard opcional */
    .actions{ margin-top:18px; display:flex; gap:10px; }
    .btn{
      appearance:none; border:1px solid var(--accent); color:#1f2937; background:#fff;
      border-radius:999px; padding:10px 14px; font-weight:600; font-size:14px; cursor:pointer;
      transition: all .15s ease;
    }
    .btn:hover{ background: var(--accent); color:#0b1220; box-shadow:0 8px 24px rgba(234,179,8,.2) }

    @media (prefers-color-scheme: dark){
      .card{ background:#0f172a; color:#e5e7eb; }
      .name{ color:#f8fafc }
      .role{ color:#94a3b8 }
      .item{ border-color: rgba(255,255,255,.08) }
      .item:hover{ box-shadow: 0 10px 24px rgba(0,0,0,.45) }
      .label{ color:#e2e8f0 }
      .value a{ color:#cbd5e1 }
      .value a:hover{ color:#f8fafc }
      .btn{ background:transparent; color:#eab308; border-color:#eab308 }
      .btn:hover{ background:#eab308; color:#0b1220 }
    }

    /* Versión para imprimir en una sola tarjeta */
    @media print{
      body{ background:#fff }
      .card{ box-shadow:none; border:1px solid #ddd }
      .btn, .actions{ display:none !important }
      .item:hover{ box-shadow:none; transform:none }
    }
  </style>
</head>
<body>
  <main class="card" aria-label="Tarjeta personal de Carlos Moretti">
    <header>
      <div class="name">Carlos Moretti</div>
      <div class="role">Desarrollador de Software</div>
    </header>

    <section class="items">
      <div class="item">
        <div class="badge">✉</div>
        <div class="label">Email</div>
        <div class="value" style="margin-left:auto">
          <a href="mailto:carlosmoretti@gmail.com">carlosmoretti@gmail.com</a>
        </div>
      </div>

      <div class="item">
        <div class="badge">✆</div>
        <div class="label">Teléfono</div>
        <div class="value" style="margin-left:auto">
          <a href="tel:+59894675026">+598 94 675 026</a>
        </div>
      </div>
    </section>

    <div class="actions">
      <!-- vCard simple (opcional): podés quitar este botón si querés aún más minimalismo -->
      <a
        class="btn"
        download="CarlosMoretti.vcf"
        href='data:text/vcard;charset=utf-8,BEGIN%3AVCARD%0AVERSION%3A3.0%0AFN%3ACarlos%20Moretti%0AN%3AMoretti%3B%C2%A0Carlos%0AEMAIL%3Bc%3DINTERNET%3Acarlosmoretti%40gmail.com%0ATEL%3BCELL%3A%2B59894675026%0ATITLE%3ADesarrollador%0AEND%3AVCARD'
      >Descargar vCard</a>
    </div>
  </main>
</body>
</html>
