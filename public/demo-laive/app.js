/* ============================================
   LAIVE V2 - WEB DEMO APPLICATION
   JavaScript Logic for Demo Functionality
   ============================================ */

// ============================================
// APPLICATION STATE
// ============================================

const state = {
    currentScreen: 'login',
    selectedMode: null,
    phase: 1,
    isRunning: false,
    timeElapsed: 0,
    timerInterval: null,
    startTime: null,
    phase1Time: 0,
    phase2Time: 0,
    phase1Target: 29 * 60, // 29 minutes in seconds
    phase2Target: 80 * 60, // 80 minutes in seconds
};

// ============================================
// PRODUCTION DATA
// ============================================

const PRODUCTION_MODES = {
    'arranque-griego': {
        name: 'ARRANQUE GRIEGO',
        phase1: {
            duration: 29 * 60,
            tasks: [
                { start: 0, end: 5, task: 'Colocación de EPPS', all: true },
                { start: 5, end: 25, task: 'Lavado de dosificadores laive 946', all: true },
                { start: 25, end: 29, task: 'Purgar línea nitrógeno con gas N₂O₃', operators: ['ayudante'] }
            ]
        },
        phase2: {
            duration: 80 * 60,
            operators: {
                maquinista: [
                    { duration: 3, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Retirar estrella' },
                    { duration: 3, task: 'Colocar Estrella' },
                    { duration: 21, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 3, task: 'Lavar externa de tolva' },
                    { duration: 9, task: 'Armar dosificadores' },
                    { duration: 5, task: 'Libre' },
                    { duration: 3, task: 'Limpiar y colocar filtro' },
                    { duration: 8, task: 'Libre' },
                    { duration: 3, task: 'Conectar jumpers' },
                    { duration: 3, task: 'Enviar aire estéril' },
                    { duration: 4, task: 'Purgar agua + montar dosif.' },
                    { duration: 2, task: 'Desinfectar dosificadores' },
                    { duration: 4, task: 'Purgar yogurt' },
                    { duration: 8, task: 'Ajustar peso/velocidad 59 BPM' }
                ],
                ayudante: [
                    { duration: 3, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Estrangular conexiones' },
                    { duration: 1, task: 'Retirar estrella' },
                    { duration: 3, task: 'Colocar Estrella' },
                    { duration: 20, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 3, task: 'Presionar JOG' },
                    { duration: 9, task: 'Armar dosificadores' },
                    { duration: 5, task: 'Tiempo libre' },
                    { duration: 3, task: 'Ayudar en hisopado' },
                    { duration: 8, task: 'Libre' },
                    { duration: 3, task: 'Calibración guías con botella' },
                    { duration: 5, task: 'Enfriar, lubricar pisadores' },
                    { duration: 2, task: 'Tiempo libre' },
                    { duration: 3, task: 'Secado de platillos' },
                    { duration: 3, task: 'Tiempo libre' },
                    { duration: 8, task: 'Ajustar velocidad 140 BPM' }
                ],
                paletizador1: [
                    { duration: 4, task: 'Retirar Tapas' },
                    { duration: 1, task: 'Retirar estrella tapadora' },
                    { duration: 3, task: 'Cerrar N₂ gas, cubrir boquilla' },
                    { duration: 20, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 5, task: 'Secar pisos' },
                    { duration: 7, task: 'Lavar tapadora' },
                    { duration: 16, task: 'Libre' },
                    { duration: 3, task: 'Secado boquilla N₂ + insp. T°' },
                    { duration: 3, task: 'Apertura nitrógeno gas' },
                    { duration: 10, task: 'Secar paredes y techo' },
                    { duration: 3, task: 'Tiempo libre' },
                    { duration: 5, task: 'Apertura nitrógeno líquido' }
                ],
                paletizador2: [
                    { duration: 4, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Cambiar topes media luna' },
                    { duration: 23, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 5, task: 'Secar pisos' },
                    { duration: 7, task: 'Lavar tapadora' },
                    { duration: 16, task: 'Libre' },
                    { duration: 3, task: 'Secar pisos' },
                    { duration: 8, task: 'Secar paredes y techo' },
                    { duration: 13, task: 'Tiempo libre' }
                ]
            }
        }
    },
    'griego-laive': {
        name: 'GRIEGO - LAIVE',
        phase1: {
            duration: 29 * 60,
            tasks: [
                { start: 0, end: 5, task: 'Preparación de equipos', all: true },
                { start: 5, end: 25, task: 'Limpieza de línea de producción', all: true },
                { start: 25, end: 29, task: 'Verificación de conexiones', operators: ['ayudante'] }
            ]
        },
        phase2: {
            duration: 80 * 60,
            operators: {
                maquinista: [
                    { duration: 3, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Desmontar componentes' },
                    { duration: 3, task: 'Montar componentes' },
                    { duration: 21, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 3, task: 'Limpieza de tolva' },
                    { duration: 9, task: 'Ensamble de dosificadores' },
                    { duration: 5, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Instalación de filtros' },
                    { duration: 8, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Conexión de sistema' },
                    { duration: 3, task: 'Activar aire estéril' },
                    { duration: 4, task: 'Purgado + montaje' },
                    { duration: 2, task: 'Desinfección de equipos' },
                    { duration: 4, task: 'Purgado de producto' },
                    { duration: 8, task: 'Calibración 59 BPM' }
                ],
                ayudante: [
                    { duration: 3, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Ajuste de conexiones' },
                    { duration: 1, task: 'Desmontar componentes' },
                    { duration: 3, task: 'Montar componentes' },
                    { duration: 20, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 3, task: 'Control de proceso' },
                    { duration: 9, task: 'Ensamble de dosificadores' },
                    { duration: 5, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Apoyo en control' },
                    { duration: 8, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Ajuste de guías' },
                    { duration: 5, task: 'Lubricación de equipos' },
                    { duration: 2, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Secado de componentes' },
                    { duration: 3, task: 'Tiempo de espera' },
                    { duration: 8, task: 'Calibración 140 BPM' }
                ],
                paletizador1: [
                    { duration: 4, task: 'Retiro de materiales' },
                    { duration: 1, task: 'Desmontar tapadora' },
                    { duration: 3, task: 'Cerrar válvulas' },
                    { duration: 20, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 5, task: 'Limpieza de área' },
                    { duration: 7, task: 'Lavado de tapadora' },
                    { duration: 16, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Secado de boquilla' },
                    { duration: 3, task: 'Apertura de gas' },
                    { duration: 10, task: 'Secado de instalaciones' },
                    { duration: 3, task: 'Tiempo de espera' },
                    { duration: 5, task: 'Activación de nitrógeno' }
                ],
                paletizador2: [
                    { duration: 4, task: 'TIEMPO DE ESPERA', blocked: true },
                    { duration: 1, task: 'Cambio de componentes' },
                    { duration: 23, task: '⚠️ SALIR AFUERA', warning: true },
                    { duration: 5, task: 'Limpieza de área' },
                    { duration: 7, task: 'Lavado de tapadora' },
                    { duration: 16, task: 'Tiempo de espera' },
                    { duration: 3, task: 'Limpieza de área' },
                    { duration: 8, task: 'Secado de instalaciones' },
                    { duration: 13, task: 'Tiempo de espera' }
                ]
            }
        }
    }
};

// ============================================
// SCREEN NAVIGATION
// ============================================

function showScreen(screenId) {
    document.querySelectorAll('.screen').forEach(screen => {
        screen.classList.remove('active');
    });
    document.getElementById(screenId).classList.add('active');
    state.currentScreen = screenId;
}

// ============================================
// LOGIN
// ============================================

document.getElementById('login-form').addEventListener('submit', (e) => {
    e.preventDefault();
    // Simulated login - always succeeds for demo
    showScreen('home-screen');
});

function togglePassword() {
    const input = document.getElementById('password');
    const btn = document.querySelector('.toggle-password');
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = '🙈';
    } else {
        input.type = 'password';
        btn.textContent = '👁️';
    }
}

function logout() {
    stopTimer();
    resetTimer();
    showScreen('login-screen');
}

// ============================================
// HOME SCREEN
// ============================================

function selectMode(modeId) {
    state.selectedMode = modeId;
    state.phase = 1;
    state.timeElapsed = 0;
    state.phase1Time = 0;
    state.phase2Time = 0;
    state.startTime = new Date();

    updatePhaseUI();
    updateOperatorCards();
    showScreen('production-screen');
}

function showHistory() {
    showScreen('history-screen');
}

function goHome() {
    stopTimer();
    resetTimer();
    showScreen('home-screen');
}

// ============================================
// TIMER FUNCTIONS
// ============================================

function toggleTimer() {
    if (state.isRunning) {
        stopTimer();
    } else {
        startTimer();
    }
}

function startTimer() {
    state.isRunning = true;
    if (!state.startTime) {
        state.startTime = new Date();
    }

    document.getElementById('play-icon').style.display = 'none';
    document.getElementById('pause-icon').style.display = 'block';
    document.getElementById('play-btn').classList.add('timer-btn--active');

    state.timerInterval = setInterval(() => {
        state.timeElapsed++;
        updateTimerDisplay();
        updateProgressBar();
        updateOperatorCards();
    }, 1000);
}

function stopTimer() {
    state.isRunning = false;
    clearInterval(state.timerInterval);

    document.getElementById('play-icon').style.display = 'block';
    document.getElementById('pause-icon').style.display = 'none';
    document.getElementById('play-btn').classList.remove('timer-btn--active');
}

function resetTimer() {
    stopTimer();
    state.timeElapsed = 0;
    updateTimerDisplay();
    updateProgressBar();
    updateOperatorCards();
}

function updateTimerDisplay() {
    const hours = Math.floor(state.timeElapsed / 3600);
    const minutes = Math.floor((state.timeElapsed % 3600) / 60);
    const seconds = state.timeElapsed % 60;

    const timerValue = document.getElementById('timer-value');
    timerValue.textContent = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

    // Update current time label
    document.getElementById('current-time').textContent = formatTimeShort(state.timeElapsed);

    // Color based on progress
    const totalDuration = state.phase === 1 ? state.phase1Target : state.phase2Target;
    const percentage = (state.timeElapsed / totalDuration) * 100;

    let color = '#00A651';
    if (percentage >= 80) color = '#C8102E';
    else if (percentage >= 50) color = '#FFA000';

    timerValue.style.color = color;
}

function updateProgressBar() {
    const totalDuration = state.phase === 1 ? state.phase1Target : state.phase2Target;
    const percentage = Math.min((state.timeElapsed / totalDuration) * 100, 100);

    // Progress bar fill
    const fill = document.getElementById('progress-fill');
    fill.style.width = `${percentage}%`;

    // Color
    let color = '#00A651';
    if (percentage >= 80) color = '#C8102E';
    else if (percentage >= 50) color = '#FFA000';
    fill.style.background = `linear-gradient(90deg, ${color}, ${lightenColor(color, 20)})`;

    // Circle progress
    const circumference = 2 * Math.PI * 35;
    const offset = circumference - (percentage / 100) * circumference;
    const circle = document.getElementById('progress-circle');
    circle.style.strokeDashoffset = offset;
    circle.style.stroke = color;

    // Percentage text
    const progressValue = document.getElementById('progress-value');
    progressValue.textContent = `${Math.round(percentage)}%`;
    progressValue.style.color = color;
}

function seekProgress(event) {
    const bar = document.getElementById('progress-bar');
    const rect = bar.getBoundingClientRect();
    const clickX = event.clientX - rect.left;
    const percentage = clickX / rect.width;

    const totalDuration = state.phase === 1 ? state.phase1Target : state.phase2Target;
    state.timeElapsed = Math.round(percentage * totalDuration);

    updateTimerDisplay();
    updateProgressBar();
    updateOperatorCards();
}

// ============================================
// PHASE NAVIGATION
// ============================================

function goToPhase(phase) {
    if (state.phase === 1) {
        state.phase1Time = state.timeElapsed;
    } else {
        state.phase2Time = state.timeElapsed;
    }

    state.phase = phase;
    state.timeElapsed = phase === 1 ? state.phase1Time : state.phase2Time;

    updatePhaseUI();
    updateTimerDisplay();
    updateProgressBar();
    updateOperatorCards();
}

function updatePhaseUI() {
    const phase1Btn = document.getElementById('phase1-btn');
    const phase2Btn = document.getElementById('phase2-btn');
    const phaseBadge = document.getElementById('phase-badge');
    const totalTime = document.getElementById('total-time');

    if (state.phase === 1) {
        phase1Btn.classList.add('timer-btn--phase-active');
        phase2Btn.classList.remove('timer-btn--phase-active');
        phaseBadge.textContent = 'FASE 1';
        phaseBadge.style.background = '#00A651';
        totalTime.textContent = '29:00';
    } else {
        phase1Btn.classList.remove('timer-btn--phase-active');
        phase2Btn.classList.add('timer-btn--phase-active');
        phaseBadge.textContent = 'FASE 2';
        phaseBadge.style.background = '#2196F3';
        totalTime.textContent = '80:00';
    }
}

function finishPhase() {
    if (state.phase === 1) {
        state.phase1Time = state.timeElapsed;
        state.phase = 2;
        state.timeElapsed = 0;
        startTimer();
        updatePhaseUI();
        updateTimerDisplay();
        updateProgressBar();
        updateOperatorCards();
    } else {
        state.phase2Time = state.timeElapsed;
        stopTimer();
        showFinishModal();
    }
}

// ============================================
// OPERATOR CARDS
// ============================================

function updateOperatorCards() {
    const mode = PRODUCTION_MODES[state.selectedMode];
    if (!mode) return;

    const operators = ['maquinista', 'ayudante', 'paletizador1', 'paletizador2'];
    const opElements = ['op1', 'op2', 'op3', 'op4'];
    const sectionElements = [
        ['sec1-op1', 'sec1-op2'],
        ['sec2-op1', 'sec2-op2']
    ];

    operators.forEach((op, index) => {
        let taskInfo;

        if (state.phase === 1) {
            taskInfo = getPhase1Task(mode.phase1, state.timeElapsed);
        } else {
            taskInfo = getPhase2Task(mode.phase2.operators[op], state.timeElapsed);
        }

        const prefix = opElements[index];

        // Update task text
        const taskEl = document.getElementById(`${prefix}-task`);
        taskEl.textContent = taskInfo.task;

        // Warning style
        if (taskInfo.warning) {
            taskEl.classList.add('operator-card__task--warning');
        } else {
            taskEl.classList.remove('operator-card__task--warning');
        }

        // Update time remaining
        document.getElementById(`${prefix}-time`).textContent = formatTimeShort(taskInfo.remaining);

        // Update progress
        document.getElementById(`${prefix}-progress`).style.width = `${taskInfo.progress}%`;

        // Update section cards
        if (index < 2) {
            document.getElementById(sectionElements[0][index]).textContent = taskInfo.task;
        } else {
            document.getElementById(sectionElements[1][index - 2]).textContent = taskInfo.task;
        }
    });
}

function getPhase1Task(phaseData, elapsed) {
    const elapsedMinutes = elapsed / 60;

    for (const task of phaseData.tasks) {
        if (elapsedMinutes >= task.start && elapsedMinutes < task.end) {
            const taskDuration = (task.end - task.start) * 60;
            const taskElapsed = elapsed - (task.start * 60);
            const remaining = taskDuration - taskElapsed;
            const progress = (taskElapsed / taskDuration) * 100;

            return {
                task: task.task,
                remaining: Math.max(0, remaining),
                progress: Math.min(100, progress),
                warning: task.warning || false
            };
        }
    }

    // Return last task if time exceeded
    const last = phaseData.tasks[phaseData.tasks.length - 1];
    return {
        task: last.task,
        remaining: 0,
        progress: 100,
        warning: false
    };
}

function getPhase2Task(operatorTasks, elapsed) {
    let accumulated = 0;

    for (const task of operatorTasks) {
        const taskDuration = task.duration * 60;
        if (elapsed < accumulated + taskDuration) {
            const taskElapsed = elapsed - accumulated;
            const remaining = taskDuration - taskElapsed;
            const progress = (taskElapsed / taskDuration) * 100;

            return {
                task: task.task,
                remaining: Math.max(0, remaining),
                progress: Math.min(100, progress),
                warning: task.warning || false
            };
        }
        accumulated += taskDuration;
    }

    // Return last task if time exceeded
    const last = operatorTasks[operatorTasks.length - 1];
    return {
        task: last.task,
        remaining: 0,
        progress: 100,
        warning: false
    };
}

// ============================================
// FINISH MODAL
// ============================================

function showFinishModal() {
    const modal = document.getElementById('finish-modal');
    const endTime = new Date();

    // Calculate stats
    const totalTime = state.phase1Time + state.phase2Time;
    const targetTime = state.phase1Target + state.phase2Target;
    const efficiency = Math.round((targetTime / totalTime) * 100);

    let grade = 'MEJORAR';
    let gradeColor = '#C8102E';

    if (efficiency >= 100) {
        grade = 'EXCELENTE';
        gradeColor = '#00A651';
    } else if (efficiency >= 95) {
        grade = 'MUY BIEN';
        gradeColor = '#4CAF50';
    } else if (efficiency >= 90) {
        grade = 'BIEN';
        gradeColor = '#FFA000';
    } else if (efficiency >= 80) {
        grade = 'ACEPTABLE';
        gradeColor = '#FF9800';
    }

    // Update modal
    document.getElementById('stat-start').textContent = formatTime(state.startTime);
    document.getElementById('stat-end').textContent = formatTime(endTime);
    document.getElementById('stat-phase1').textContent = formatTimeShort(state.phase1Time);
    document.getElementById('stat-phase2').textContent = formatTimeShort(state.phase2Time);
    document.getElementById('stat-total').textContent = formatDuration(totalTime);

    const gradeEl = document.getElementById('stat-grade');
    gradeEl.textContent = grade;
    gradeEl.style.background = gradeColor;

    modal.classList.add('active');
}

function closeFinishModal() {
    document.getElementById('finish-modal').classList.remove('active');
    goHome();
}

// ============================================
// FULLSCREEN
// ============================================

function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch(err => {
            console.log('Fullscreen error:', err);
        });
    } else {
        document.exitFullscreen();
    }
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

function formatTimeShort(seconds) {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

function formatDuration(seconds) {
    const hours = Math.floor(seconds / 3600);
    const mins = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    return `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

function formatTime(date) {
    return date.toLocaleTimeString('es-PE', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
}

function lightenColor(color, percent) {
    const num = parseInt(color.replace('#', ''), 16);
    const amt = Math.round(2.55 * percent);
    const R = (num >> 16) + amt;
    const G = (num >> 8 & 0x00FF) + amt;
    const B = (num & 0x0000FF) + amt;
    return '#' + (
        0x1000000 +
        (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
        (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
        (B < 255 ? B < 1 ? 0 : B : 255)
    ).toString(16).slice(1);
}

// ============================================
// INITIALIZATION
// ============================================

document.addEventListener('DOMContentLoaded', () => {
    console.log('LAIVE V2 Demo initialized');
    showScreen('login-screen');
});
